<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\DetailPlan;
/**
 * App\Models\Plan
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string|null $description
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUrl($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|DetailPlan[] $details
 * @property-read int|null $details_count
 */
class Plan extends Model
{
    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }


    public function getRouteKeyName()
    {
        return 'url';
    }

    public function search(Request $request)
    {
       return $this->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%');
        });
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * @param Request $request
     * SELECT * FROM profiles WHERE id not in ( SELECT profile_id FROM plan_profile WHERE plan_id = 5)
     */
    public function getAvailableProfiles(Request $request)
    {
       return Profile::whereNotIn('profiles.id',function ($q){
           $q->select('plan_profile.profile_id');
           $q->from('plan_profile');
           $q->whereRaw("plan_profile.plan_id={$this->id}");
       })->when($request->search,function ($q) use($request){
           return $q->where('name','like','%'.$request->search.'%');
       })->paginate();
    }

}
