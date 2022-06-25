<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    const ROLE_USER_ADMINISTRATION_ID = 1;
    const ROLE_USER_ADMINISTRATION_NAME = "ADMIN";

    const ROLE_USER_CLIENT_CUSTOMER_ID = 2;
    const ROLE_USER_CLIENT_CUSTOMER_NAME = "CLIENT_CUSTOMER";


}
