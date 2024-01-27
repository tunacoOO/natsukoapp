<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts_rel = $user->posts()->get();
        $post = new Post;

        return view('posts.user')->with([
            'user' => $user,
            'posts' => $posts_rel,
        ]);
    }
}
