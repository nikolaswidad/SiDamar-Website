<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBulanKasRequest;
use App\Http\Requests\UpdateBulanKasRequest;
use Illuminate\Http\Request;
use App\Models\BulanKas;
use App\Models\PembayaranKas;
use Illuminate\Support\Facades\Session;

class BulanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //total terkumpul value based on count on status and then multiply by 20000
        // $pembayaranKas 
        // $total_terkumpul = PembayaranKas
        //set total terkumpul to 0 to all bulanKas
        $bulanKas = BulanKas::all();
        foreach($bulanKas as $bulanKas){
            $bulanKas->total_terkumpul = 0;
            $bulanKas->save();
        }
        //get count on how many pembayaranKas in each Bulan
        $pembayaranKas = PembayaranKas::all();
        foreach($pembayaranKas as $pembayaranKas){
            $bulanKas = BulanKas::find($pembayaranKas->bulan_kas_id);
            $bulanKas->total_terkumpul += 20000;
            $bulanKas->save();
        }
        return view('dashboard.bulanKas.index', [
            'bulanKas' => BulanKas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bulanKas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBulanKasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulanKasRequest $request)
    {
        $validatedData =  $request->validate([
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        $existingBulanKas = BulanKas::where('bulan', $validatedData['bulan'])
                                    ->where('tahun', $validatedData['tahun'])
                                    ->first();

        if ($existingBulanKas) {
            Session::flash('error', 'Bulan and tahun already exists');
            return redirect('/dashboard/bulanKas');
        }
        // dd($validatedData);
        BulanKas::create($validatedData);
        Session::flash('success', 'New Bulan Kas has been added');
        return redirect('/dashboard/bulanKas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bulanKas = BulanKas::find($id);

        if (!$bulanKas) {
            return abort(404);
        }
        //dd($bulanKas);
        return view('dashboard.bulanKas.show',[
            'bulanKas' => $bulanKas,
            'id' => $bulanKas->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bulanKas = BulanKas::find($id);
        if (!$bulanKas) {
            return abort(404);
        }
        return view('dashboard.bulanKas.edit',[
            'bulanKas' => $bulanKas,
            'id' => $bulanKas->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBulanKasRequest  $request
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $bulanKas = BulanKas::find($id);
        $bulanKas->bulan = $request->bulan;
        $bulanKas->tahun = $request->tahun;
        
        //check if the same month and year already exists
        $existingBulanKas = BulanKas::where('bulan', $bulanKas->bulan)
                                    ->where('tahun', $bulanKas->tahun)
                                    ->first();

        if ($existingBulanKas) {
            Session::flash('error', 'Bulan and tahun already exists');
            return redirect('/dashboard/bulanKas');
        }

        $bulanKas->save();
        Session::flash('success', 'Update Bulan Kas Success');
        return redirect('/dashboard/bulanKas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bulanKas = BulanKas::find($id);
        //dd($bulanKas);
        
        $bulanKas->delete();
        Session::flash('success', 'Delete Bulan Kas Success');
        return redirect('/dashboard/bulanKas');

        
    }
}
