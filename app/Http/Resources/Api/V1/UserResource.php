<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->resource == null) {
            return;
        }

        $user = $this->resource;

        $ret = [
            'id'    =>  $user->id,
            'name'  =>  $user->name,
            'surname'  =>  $user->surname,
            'email' =>  $user->email,
            'profile_photo_url' =>  $user->profile_photo_url,
            'role'  =>  $user->role,
            'invoices'  =>  $user->invoices,
            'subscriptions' =>  $user->subscriptions,
            'addresses' =>  $user->addresses,
            'has_subscribed'    =>  $user->has_subscription
        ];
        return $ret;
    }
}