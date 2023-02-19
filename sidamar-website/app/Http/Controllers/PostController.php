<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $posts)
    {
        $data = $posts->orderBy('created_at','desc')->get();
        return view('posts',compact('data'));
    }

    public function show($slug){
        $data = Post::where('slug', $slug)->get();
        return view('blog.isi',compact('data'));
    }

    // public function show(Post $post){
    //     return view('post',[
    //         "title" => "single-post",
    //         "active" => "posts",
    //         "post" => $post
    //     ]);
    // }
}
