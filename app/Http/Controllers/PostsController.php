<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class PostsController extends Controller
{
    public function show(){

        $posts = Post::all();
        return view('main', [ 'posts' => $posts ]);
    }

    function create(){
        return view('create' ,[
            'user_id' => auth()->id(), 
            'user_name' => auth()->user()->name,
            'categories' => Category::select('name')->get()
        ]);
    }
    /**
 * Store a new blog post.
 *
 * @param  \App\Http\Requests\StorePostRequest  $request
 * @return Illuminate\Http\Response
 */
    function addToBase(StorePostRequest $req){
        $post = new Post;

        $post -> user_id = $req->user_id;
        $post -> user_name = $req->user_name;
        $post -> title = $req->title;
        $post -> topic = $req->topic;
        $post -> content = $req->content;

        $post -> save(); 

        return redirect('/');
    }
    function userProfile($id){
        return view('user', ['user' => User::findOrFail($id)]);
    }
}








