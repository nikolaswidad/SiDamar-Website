<?php

namespace App\Http\Controllers;

use App\Models\donation;
use App\Models\Donatur;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Illuminate\Support\Carbon;


class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donatur = Donatur::paginate(10);
        return view('dashboard.donatur.index',compact('donatur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentDate = Carbon::now()->toDateString();

        $donation = donation::where('date', '>=', $currentDate)->get();
        // return view('dashboard.author.posts.edit');
        return view('donatur.create', compact('donation'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'no_hp' => 'required',
            'donation_id' => 'required',
            'image' => 'image|file|max:1024',
            'email' => 'required',
            'total' => 'required',
            'payment_type' => 'required'
        ]);

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
        $donatur = Donatur::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'donation_id' => $request->donation_id,
            'image' => 'upload/donatur/'.$new_image,
            'email' => $request->email,
            'total' => $request->total,
            'payment_type' => $request->payment_type,

        ]);

        $image->move('upload/donatur', $new_image);

        return view('donatur/bukti', compact('donatur'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(donatur $donatur)
    {
        return view('dashboard.donatur.show', ['donatur' => $donatur,]);
        
    }

    public function invoice($id)
    {
        $donatur = Donatur::where('id', $id)->first();

        return view('donatur.cetak', ['donatur' => $donatur,]);
        
    }

    public function bukti($id)
    {
        $donatur = Donatur::where('id', $id)->first();

        return view('donatur.bukti', ['donatur' => $donatur,]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $donation = donation::all();
        // $donatur = Donatur::findorfail($id);
        // return view('dashboard.author.posts.edit', compact('post','category'));
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
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required',
        //     'category_id' => 'required',
        //     'image' => 'image|file|max:1024',
        //     'body' => 'required'
        // ]);
        

        // $post = Post::findorfail($id);

        // if($request->has('image')){
        //     $image = $request->image;
        //     $new_image = time().$image->getClientOriginalName();
        //     $image->move('upload/posts', $new_image);
        // }

        // $post_data = [
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'category_id' => $request->category_id,
        //     'image' => 'upload/posts/'.$new_image,
        //     'excerpt' => Str::limit(strip_tags($request->body), 200),
        //     'body' => $request->body
        // ];

        // $post->update($post_data);


        // return redirect('dashboard/posts')->with('success','Post berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $donatur = donatur::findOrFail($id);
            $donatur->delete();
            
            return redirect()->back()->with('success', 'Data Deleted Successfully');
        }
    }
}
