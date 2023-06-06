<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Merch;
use Illuminate\Http\Request;
use illuminate\Support\Str;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::all();
        return view('dashboard.customer.index',compact('customer'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merch = Merch::all();
        // return view('dashboard.author.posts.edit');
        return view('merch.create', compact('merch'));
    }

    public function getProductPrice($id)
    {
        $merch = Merch::findOrFail($id);

        return response()->json([
            'price' => $merch->price,
        ]);
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
            'merch_id' => 'required',
            'image' => 'image|file|max:1024',
            'email' => 'required',
            'total' => 'required',
            'payment_type' => 'required'
        ]);
        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        // $merch = Merch::findOrFail($id);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        $customer = Customer::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'merch_id' => $request->merch_id,
            'image' => 'upload/customer/'.$new_image,
            'email' => $request->email,
            'total' => $request->total,
            'payment_type' => $request->payment_type,

        ]);

        $image->move('upload/customer', $new_image);
        return view('merch/cetak', compact('customer'));
        // return view('merch/create',['merch'=>$merch]);
        //return redirect('merch/create');
    }

    public function invoice($id)
    {
        $customer = Customer::where('id', $id)->first();

        return view('merch.cetak', ['customer' => $customer,]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        return view('dashboard.customer.show', ['customer' => $customer,]);
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
            $customer = Customer::findOrFail($id);
            $customer->delete();
            
            return redirect()->back()->with('success', 'Data Deleted Successfully');
        }
    }
}
