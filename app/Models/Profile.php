<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    protected $guarded = [];

    public function search(Request $request)
    {
        return $this->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

//

    /**
     * SELECT * FROM permissions
     * WHERE id NOT IN
     * ( SELECT permission_id FROM `permission_profile` WHERE profile_id = 1)
     */
    public function getAvailablePermission(Request $request)
    {
        return Permission::whereNotIn('permissions.id', function ($q) {
            $q->select('permission_profile.permission_id');
            $q->from('permission_profile');
            $q->whereRaw("permission_profile.profile_id={$this->id}");
        })->when($request->search, function ($q) use ($request) {
            return $q->where('permissions.name', 'like', '%' . $request->search . '%');
        })->paginate();
    }
}
