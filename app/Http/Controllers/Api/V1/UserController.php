<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getInfoProfile(User $user)
    {
        return (new UserResource($user))->resolve();
    }
}
