<?php

namespace App\Http\Controllers;

use App\Models\Merch;
use Illuminate\Http\Request;

class MerchController extends Controller
{
    
    public function index2()
    {
        $merch = Merch::all();
        return view('merch.index', ['merch' => $merch,]);
    }

    public function index()
    {
        $merch = Merch::all();
        return view('dashboard.merch.index', ['merch' => $merch,]);
    }

    public function create()
    {
        return view('dashboard.merch.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'desc' => 'required',
            'image' => 'image|file|max:1024',

        ]);
        $desc = strip_tags($request->desc);
        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        Merch::create([
            'title' => $request->title,
            'desc' => $desc,
            'price' => $request->price,
            'image' => 'upload/merches/'.$new_image,
        ]);
        $image->move('upload/merches', $new_image);
        return redirect('dashboard/merch/');
    }

    public function show(Merch $merch)
    {
        return view('merch.show', ['merch' => $merch,]);

    }

    public function dashow(Merch $merch)
    {
        return view('dashboard.merch.show', ['merch' => $merch,]);

    }

    public function edit(Merch $merch)
    {
        return view('dashboard.merch.edit',[
            'merch' => $merch,
            'id' => $merch->id
        ]);
    }

    
    public function update(Request $request, $id)
    {
        {
            $merch = Merch::findOrFail($id);
            $merch-> title=$request->title;
            $merch-> desc=strip_tags($request->desc);
            $merch-> price=$request->price;
            // $merch-> image=$request->image;
            $merch-> save();
            
            return redirect('dashboard/merch/')->with('success','Merch berhasil diperbarui');
    
        }
    }

    
    public function destroy($id)
    {
        $merches = Merch::findOrFail($id);
        $merches->delete();
        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}