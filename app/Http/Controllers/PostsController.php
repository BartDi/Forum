<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    public function show(){

        $posts = Post::all();
        return view('main', [ 'posts' => $posts ]);
    }

    function create(){
        return "12";
    }
}
