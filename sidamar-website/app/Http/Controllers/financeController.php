<?php

namespace App\Http\Controllers;

use App\Models\finance;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;


class financeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finance = finance::all();
        return view('dashboard.finances.index',['finance'=>$finance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.finances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $finance = new finance();
        $finance-> keperluan=$request->keperluan;
        $finance-> date=$request->date;
        $finance-> cashin=$request->cashin;
        $finance-> cashout=$request->cashout;
        $finance-> keterangan=$request->keterangan;
        $finance-> save();
        return redirect('dashboard/finances/')->with('success','Report Berhasil Dibuat');
        // return view('dashboard.finances.create',['finance'=>$finance]);
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
    public function edit(finance $finance)
    {
        return view('dashboard.finances.edit',[
            'finance' => $finance,
            'id' => $finance->id
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
        
        $finance = finance::findOrFail($id);
        $finance-> keperluan=$request->keperluan;
        $finance-> date=$request->date;
        $finance-> cashin=$request->cashin;
        $finance-> cashout=$request->cashout;
        $finance-> keterangan=$request->keterangan;
        $finance-> save();
        
        return redirect('dashboard/finances/')->with('success','Report Berhasil Diperbarui');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finance = finance::findOrFail($id);
        $finance->delete();
        
        return redirect()->back()->with('success', 'Report Berhasil Dihapus');
    }
}
