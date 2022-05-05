<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guard = [];

    const ROLE_USER_ADMINISTRATION_ID = 1;
    const ROLE_USER_ADMINISTRATION_NAME = "ADMIN";

    const ROLE_USER_EDIT_ONLY_ID = 2;
    const ROLE_USER_EDIT_ONLY_NAME = "EDIT_ONLY";

    const ROLE_USER_CUSTOMER_ID = 3;
    const ROLE_USER_CUSTOMER_NAME = "CUSTOMER";
}
