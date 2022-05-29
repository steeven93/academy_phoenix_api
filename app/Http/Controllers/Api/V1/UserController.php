<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getInfoProfile()
    {
        $user = request()->user();
        return (new UserResource($user))->resolve();
    }

    public function signUpPlanSubscription(UserSignUpPlanSubscriptionRequest $request)
    {
        $user = $request->user();
        $plan_subscription = PlanSubscription::find($request->input('plan_subscription_id'));

        (new InvoiceController())->store($user, $plan_subscription, $request);

        $user->plans_subscription_id = $request->input('plan_subscription_id');

        $user->save();
    }
}
