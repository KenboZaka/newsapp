<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
   
        $user->load('posts');
        // dd($user);
        return view('user', ['user'=>$user]);
    }
}
