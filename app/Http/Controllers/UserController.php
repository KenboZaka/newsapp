<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(10);
        return view('.users.user', ['user'=>$user, 'posts'=>$posts]);
    }
}
