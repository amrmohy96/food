<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\Plan;
/**
 * App\Models\DetailPlan
 *
 * @property int $id
 * @property int $plan_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Plan $plan
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DetailPlan extends Model
{
    protected $table = 'details_plan';

    protected $guarded = [];
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
