<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\V1\CustomerRequest;
use App\Http\Resources\Api\V1\CustomerResource;
use App\Http\Resources\Api\V1\CustomerResources;
use App\Models\Customer;
use App\Models\Note;
use App\Models\User;
use App\Numerology\Class\SheetsWorks;
use App\Numerology\Class\Thesis;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function get_customers()
    {
        $customers = Customer::all();
        return $this->sendResponse($customers);
    }

    public function get_customer(Customer $customer)
    {

        return $this->sendResponse((new CustomerResource($customer))->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $user_id =  $request->user()->id;
        $params = $request->all();
        $carbon = new Carbon(new DateTime($params['birthday']));
        $params['birthday'] = $carbon;
        $customer = Customer::create(
            $request->all()
            + ['user_id' => $user_id]
        );

        return $this->sendResponse((new CustomerResource($customer))->resolve());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return $this->sendResponse($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Customer $customer)
    {
        foreach($customer->notes as $note)
        {
            $note->delete();
        }

        $customer->delete();

        return $this->sendResponse('', "Customer {$customer->name} is deleted");
    }


    public function create_thesis(Customer $customer)
    {
        [$file_stream, $file_name] = (new Thesis())->create($customer);
        $file_stream = base64_encode($file_stream);

        return $this->sendResponse([
            'file_stream'   =>  $file_stream,
            'file_name'     =>  $file_name
        ]);
    }

    public function create_matrix(Customer $customer)
    {
        ['file_stream' => $file_stream, 'file_name' => $file_name] = (new SheetsWorks())->create($customer);
        $file_stream = base64_encode($file_stream);

        return $this->sendResponse([
            'file_stream'   =>  $file_stream,
            'file_name'     =>  $file_name
        ]);
    }

    public function create_note(Request $request)
    {
        $note = Note::create([
            'title' =>  $request->title,
            'content'   =>  $request->content,
            'customer_id'   =>  $request->customer_id
        ]);
        return $this->sendResponse($note, 'note was created');
    }

    public function edit_note(Request $request, Note $note)
    {
        $note->update($request->all());

        return $this->sendResponse($note, 'note was updated');
    }

    public function delete_note(Request $request, Note $note)
    {
        $note->delete();

        return $this->sendResponse(null, "note {$note->title} was deleted");
    }
}
