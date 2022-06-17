<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $customer = $this->resource;

        return [
            'id'    =>  $customer->id,
            'name'  =>  $customer->name,
            'surname'   =>  $customer->surname,
            'email' =>  $customer->email,
            'birthday'  =>  $customer->birthday,
            'notes' =>  $customer->notes()->orderBy('id', 'desc')->get()
        ];
    }
}