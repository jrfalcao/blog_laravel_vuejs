<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function getUserByID(Request $request)
    {
        return User::find($request->user_id);
    }
}
