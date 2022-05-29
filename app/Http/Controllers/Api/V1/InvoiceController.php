<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\InvoiceRequest;
use App\Http\Requests\Api\V1\UserSignUpPlanSubscriptionRequest;
use App\Http\Resources\Api\V1\InvoiceResource;
use App\Http\Resources\Api\V1\InvoiceResources;
use App\Models\PlanSubscription;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInvoices(User $user)
    {
        return (new InvoiceResources($user->invoices))->resolve();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, PlanSubscription $plan_subscription, UserSignUpPlanSubscriptionRequest $request)
    {
        $input['total_price'] = $plan_subscription->price;
        $input['payment']   = $request->input('payment');
        $input['payed']  = true;
        $input['notes'] = $request->input('notes');

        $invoice = Invoice::create($input);

        return true;
    }


}
