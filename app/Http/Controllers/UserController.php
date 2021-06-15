<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function getUserByID(Request $request)
    {
        return User::find($request->user_id);
    }
}
