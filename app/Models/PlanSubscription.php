<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanSubscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    const PLAN_SUBSCRIPTION_FREE_ID = 1;
    const PLAN_SUBSCRIPTION_FREE_NAME = "Free";

    const PLAN_SUBSCRIPTION_BASE_ID = 2;
    const PLAN_SUBSCRIPTION_BASE_NAME = "Base";

    protected $casts = [
        'price' =>  PriceCast::class,
    ];
    /**
     * Get all of the users for the PlanSubscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
