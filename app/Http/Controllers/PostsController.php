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
        return view('create');
    }
    function addToBase(Request $req){
        $post = new Post;

        $post -> title = $req->title;
        $post -> topic = $req->topic;
        $post -> content = $req->content;

        $post -> save(); 

        return redirect('/');
    }
}
