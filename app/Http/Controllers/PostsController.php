<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


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
    function categoriesForm(){
        return view('add');
    }
    function addCategory(CategoryRequest $req){
        $cat = new Category;

        $cat -> name = $req->name;
        $cat->save();

        return redirect('/');
    }
    function like($pId){
        $postModel = Post::findOrFail($pId);
        $user_id = auth()->id();
        $isDeleted = False;
        $posts = DB::table('user_liked_posts')
            ->select('post_id')
            ->where('user_id', '=', $user_id)
            ->get();
        foreach($posts as $post){
            foreach($post as $liked){
                if($liked == $pId){
                    DB::table('user_liked_posts')
                        ->where('post_id', '=', $pId)
                        ->where('user_id', '=', $user_id)
                        ->delete();
                        $postModel->likes -= 1;
                    $isDeleted = True;
                }
            }
        }
        if($isDeleted==False){
            DB::table('user_liked_posts')->insert([
                'user_id' => $user_id,
                'post_id' => $pId
            ]);
            $postModel->likes += 1;
        }
        $postModel->save();
        return redirect()->back();
    }
    function postSite($id){
        return view('post', ['post'=>Post::findOrFail($id), 'url'=> $this->isLiked($id)]);
    }
    public function isLiked($id){
        $url = '';
        if(DB::table('user_liked_posts')->where('post_id', '=', $id)->where('user_id', '=', auth()->id())->exists()){
            $url = '/images/heartLiked.png'; 
        }
        else{
            $url = '/images/heart.png';
        }
        return $url;
    }

}








