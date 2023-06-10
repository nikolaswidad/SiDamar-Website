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

    public function bukti2($id)
    {
        $customer = Customer::where('id', $id)->first();

        return view('merch.bukti', ['customer' => $customer,]);
        
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
            'address' => 'required',
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
            'address' => $request->address,
            'payment_type' => $request->payment_type,

        ]);

        $image->move('upload/customer', $new_image);
        return view('merch/cetak', compact('customer'));

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

    public function destroy($id)
    {
        {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            
            return redirect()->back()->with('success', 'Data Deleted Successfully');
        }
    }
}
