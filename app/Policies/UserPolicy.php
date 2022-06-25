<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
            return false;
        }

        return true;
    }

    public function subscribe()
    {

        return !$user->isAdmin() && is_null($user->plan_subscription_id);
    }
}
