<?php

namespace App\Policies;

use App\Models\PlanSubscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before(User $user)
    {
        if($user->isAdmin())
        {
            return true;
        }
    }

    public function create(User $user)
    {
        $plan_subscription_id = $user->plan_subscription?->id;

        return $plan_subscription_id  === PlanSubscription::PLAN_SUBSCRIPTION_BASE_ID;
    }

    public function update(User $user)
    {
        $plan_subscription_id = $user->plan_subscription?->id;

        return $plan_subscription_id  === PlanSubscription::PLAN_SUBSCRIPTION_BASE_ID;
    }

    public function delete(User $user)
    {
        $plan_subscription_id = $user->plan_subscription?->id;

        return $plan_subscription_id  === PlanSubscription::PLAN_SUBSCRIPTION_BASE_ID;
    }

    public function view(User $user)
    {
        $plan_subscription_id = $user->plan_subscription?->id;

        return $plan_subscription_id  === PlanSubscription::PLAN_SUBSCRIPTION_BASE_ID;
    }
}
