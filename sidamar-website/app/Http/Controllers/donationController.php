<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donation;

class donationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donation = donation::all();
        return view('dashboard.donation.index',['donation'=>$donation]);
    }

    public function index2()
    {
        $donation = donation::all();
        return view('donatur.index',['donation'=>$donation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.donation.create');
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
            'title' => 'required|max:255',
            'date' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',

        ]);
        $body = strip_tags($request->body);
        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        donation::create([
            'title' => $request->title,
            'date' => $request->date,
            'body' => $body,
            'image' => 'upload/donation/'.$new_image,
        ]);
        $image->move('upload/donation', $new_image);
        return redirect('dashboard/donation/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(donation $donation)
    {
        return view('donatur.show', ['donation' => $donation,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(donation $donation)
    {
        return view('dashboard.donation.edit',[
            'donation' => $donation,
            'id' => $donation->id
        ]);
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
        $donation = donation::findOrFail($id);
        $donation-> title=$request->title;
        $donation-> body=strip_tags($request->body);
        $donation-> date=$request->date;
        // if($request->has('image')){
        //     $image = $request->image;
        //     $new_image = time().$image->getClientOriginalName();
        //     $image->move('upload/donation', $new_image);
        // }
        // $donation-> image='upload/donation/'.$new_image;
        $donation-> save();
        return redirect('dashboard/donation/')->with('success','Event berhasil diperbarui');
        //return view('dashboard.donation.edit',['donation'=>$donation]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = donation::findOrFail($id);
        $donation->delete();
        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
