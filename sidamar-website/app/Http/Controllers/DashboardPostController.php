<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use illuminate\Support\Str;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $post = Post::orderBy('created_at','desc')->paginate(10);
    //     // $post->orderBy('created_at','desc');
    //     return view('dashboard.author.posts.index',compact('post'));
    // }

    public function index()
    {
        $post = Post::orderBy('created_at','desc')->filter(request(['search']))->paginate(10);
        // $post->orderBy('created_at','desc');
        return view('dashboard.author.posts.index',compact('post'));
    }

    // public function index($request)
    // {
    //     if($request->has('search')){
    //         $post = Post::where('title', 'LIKE', '%' .$request->search. '%')->paginate(10);
    //     }
    //     else {
    //         $post = Post::orderBy('created_at','desc')->paginate(10);
    //         return view('dashboard.author.posts.index',compact('post'));
    //     }
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = PostCategory::all();
        // return view('dashboard.author.posts.edit');
        return view('dashboard.author.posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        if($request->has('image')){
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('upload/posts', $new_image);
            $validatedData['image'] = $new_image;
        }

        Post::create($validatedData);

        return redirect('dashboard/posts/create')->with('success','Post baru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = PostCategory::all();
        $post = Post::findorfail($id);
        return view('dashboard.author.posts.edit', compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);
        

        $post = Post::findorfail($id);

        
        if($request->has('image')){
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('upload/posts', $new_image);
            $validatedData['image'] = $new_image;
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['slug'] = Str::slug($request->title);

        // $post_data = [
        //     'title' => $request->title,
        //     'slug' =>  Str::slug($request->title),
        //     'category_id' => $request->category_id,
        //     'excerpt' => Str::limit(strip_tags($request->body), 200),
        //     'body' => $request->body
        // ];

        $post->update($validatedData);


        return redirect('dashboard/posts')->with('success','Post berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect('dashboard/posts')->with('success','Data berhasil dihapus (silahkan cek trash can)');
    }

    // nampilin data yang udah kehapus
    public function deleted(){
        $post = Post::onlyTrashed()->paginate(10);
        return view('dashboard.author.posts.deleted', compact('post'));
    }

    //restore data yang sebelumnya kehapus
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        return redirect('dashboard/posts/deleted')->with('success','Data berhasil dikembalikan');
    }

    //delete permanen
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        return redirect('dashboard/posts/deleted')->with('success','Data berhasil dihapus permanen');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
