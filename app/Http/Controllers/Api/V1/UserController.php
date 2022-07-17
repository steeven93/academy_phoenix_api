<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\V1\LoggedUserRequest;
use App\Http\Requests\Api\V1\UserSignUpPlanSubscriptionRequest;
use App\Http\Requests\DeletePaymentRequest;
use App\Http\Requests\SetPaymentMethodRequest;
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
        $user->createOrGetStripeCustomer();
        return $this->sendResponse((new UserResource($user))->resolve());
    }

    public function getIntentPaymentMethod()
    {
        $user = request()->user();
        $client_secret = $user->createSetupIntent()->client_secret;
        $stripe_customer_id = $user->createOrGetStripeCustomer()->id;
        return $this->sendResponse(compact('client_secret', 'stripe_customer_id'));
    }
    public function getPaymentMethods()
    {
        $user = request()->user();
        $user->createOrGetStripeCustomer();
        $paymentMethods = $user->paymentMethods();
        return $this->sendResponse($paymentMethods);
    }

    public function setPaymentMethod(SetPaymentMethodRequest $request)
    {
        $user = request()->user();
        $user->createOrGetStripeCustomer();
        $done = $user->addPaymentMethod($request->payment_method_id);
        return $this->sendResponse([], 'Payment Added to Customer Successfully');
    }

    public function addPaymentMethod(Request $request)
    {
        $user = request()->user();
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($request->paymentMethod);
    }

    public function deletePaymentMethod(DeletePaymentRequest $request)
    {
        $user = request()->user();
        $user->createOrGetStripeCustomer();
        if($request->remove_all_payments)
        {
            $user->deletePaymentMethods();
            return $this->sendResponse([], 'All payments removed succesfully');
        }
        $user->deletePaymentMethod($request->type_method);
        return $this->sendResponse([], 'the request payment was deleted successfully');
    }

    public function signUpPlanSubscription(UserSignUpPlanSubscriptionRequest $request)
    {
        $user = $request->user();
        $user->createOrGetStripeCustomer();
        $options = [
            'email' =>  $user->email,
        ];
        $plan_subscription = PlanSubscription::find($request->plan_subscription_id);
        $SubscriptionQuery = $user->newSubscription($plan_subscription->name, $plan_subscription->stripe_id);
        if($request->has('payment_method_id'))
        {
            $SubscriptionQuery->create($request->payment_method_id, $options);
        }
        else
        {
            $SubscriptionQuery->add();
        }

        // (new InvoiceController())->store($user, $plan_subscription, $request);
        $user->save();
        return $this->sendResponse([],'User Sign up Successfully');
    }

    public function getPlanSubScription()
    {
        $plans = PlanSubScription::all();
        return $this->sendResponse($plans);
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
