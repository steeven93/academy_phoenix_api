<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;
            $success['email']   =   $authUser->email;
            $success['role_id'] =  $authUser->role_id;
            return $this->sendResponse($success, 'User signed in');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['role_id'] = Role::ROLE_USER_CLIENT_CUSTOMER_ID;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('PhoenixAcademy')->plainTextToken;
        $success['name'] =  $user->name;
        $success['email']   =   $user->email;
        $success['role_id'] =  $user->role_id;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        Auth::guard('web')->logout();

        return $this->sendResponse('', 'Logout successfully');
    }
}
