<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\V1\LoggedUserRequest;
use App\Http\Requests\Api\V1\UserSignUpPlanSubscriptionRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\PlanSubscription;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function getInfoProfile()
    {
        $user = request()->user();
        return $this->sendResponse((new UserResource($user))->resolve());
    }

    public function signUpPlanSubscription(UserSignUpPlanSubscriptionRequest $request)
    {
        $user = $request->user();
        $stripeCustomer = $user->createAsStripeCustomer();
        $options = [
            'email' =>  $user->email,
        ];
        $plan_subscription = PlanSubscription::find($request->plan_subscription_id);
        $user->newSubscription($plan_subscription->name, $plan_subscription->price)
        ->create($request->payment_method_id, $options);

        // (new InvoiceController())->store($user, $plan_subscription, $request);

        $user->plans_subscription_id = $request->plan_subscription_id;
        $user->start_subscription = Carbon::now();
        $user->end_subscription = Carbon::now()->add(30, 'day');
        $user->save();
        return $this->sendResponse([],'User Sign up Successfully');
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $user = request()->user();
        $user->password = $request->password;
        $user->save();

        $user->tokens()->delete();
        return $this->sendResponse([], 'Password Changed Successfully');
    }

    public function getLoggedUser(LoggedUserRequest $request)
    {
        $user = request()->user();
        return $this->sendResponse($user);
    }

    public function create_address(Request $request)
    {
        $user = request()->user();
        $address = Address::create([
            'address'   =>  $request->address,
            'cap'   =>  $request->cap,
            'phone' =>  $request->phone,
            'state' =>  $request->state,
            'province'  =>  $request->province,
            'user_id'   =>  $user->id
        ]);

        return $this->sendResponse($address);
    }

    public function create_invoice(Request $request)
    {
        $user = request()->user();
        $invoice = Invoice::create([
            'notes' =>  $request->notes,
            'total_price'   => $request->total_price,
            'payment'   =>  'Stripe',
            'payed'     =>  false,
            'user_id'   =>  $user->id,
            'address_id'    =>  $user->addresses()->first()->id,
            'plan_subscription_id'  =>  $request->plan_subscription_id
        ]);

        return $this->sendResponse($invoice);
    }
}
