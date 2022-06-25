<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\V1\LoggedUserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\PlanSubscription;
use App\Models\Role;
use App\Models\User;
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
        $plan_subscription = PlanSubscription::find($request->input('plan_subscription_id'));

        (new InvoiceController())->store($user, $plan_subscription, $request);

        $user->plans_subscription_id = $request->input('plan_subscription_id');

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

    public function create_address(Request $request, User $user)
    {
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

    public function create_invoice(Request $request, User $user)
    {
        $invoice = Invoice::create([
            'notes' =>  $request->notes,
            'total_price'   => $request->total_price,
            'payment'   =>  'Stripe',
            'payed'     =>  $request->payed,
            'user_id'   =>  $user->id,
            'address_id'    =>  $request->address_id,
            'plan_subscription_id'  =>  $request->plan_id
        ]);

        return $this->sendResponse($invoice);
    }
}
