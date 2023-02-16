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

    public function show(Post $post){
        return view('post',[
            "post" => $post
        ]);
    }
}
