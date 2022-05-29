<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\V1\AddressRequest;
use App\Http\Resources\Api\V1\AddressResource;
use App\Http\Resources\Api\V1\AddressResources;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_addresses()
    {
        $user = auth()->user();
        return $this->sendResponse((new AddressResources($user->addresses))->resolve());
    }

    public function get_address(Address $address)
    {
        return $this->sendResponse($address);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $input['user_id']   =   $request->user()->id;
        $address = Address::create($request->all() + $input);
        return (new AddressResource($address))->resolve();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, Address $address)
    {
        $address->update($request->all());
        return $this->sendResponse($address, 'Address Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return $this->sendResponse('', "Address #{$address->id} deleted");
    }
}
