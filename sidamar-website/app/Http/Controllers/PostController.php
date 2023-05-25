<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
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
        $postcategory = PostCategory::all();
        $data = $posts->latest()->filter(request(['search','category','author']))->paginate(5)->withQueryString();
        return view('posts',compact('data','postcategory'));
    }

    public function show($slug){
        $postcategory = PostCategory::all();

        $data = Post::where('slug', $slug)->get();
        return view('blog.isi',compact('data','postcategory'));
    }

    public function listCategory(PostCategory $category){
        $postcategory = PostCategory::all();

        $data = $category->posts()->paginate();
        return view('blog.isi',compact('data','postcategory'));
    }
}
