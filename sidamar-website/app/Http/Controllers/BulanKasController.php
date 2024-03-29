<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBulanKasRequest;
use App\Http\Requests\UpdateBulanKasRequest;
use App\Models\BulanKas;
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
        return view('dashboard.bulanKas.index', [
            'bulanKas' => BulanKas::all(),
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
    public function show(BulanKas $bulanKas)
    {
        dd($bulanKas);
        return view('dashboard.bulanKas.show',[
            'bulanKas' => $bulanKas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function edit(BulanKas $bulanKas)
    {
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
    public function update(UpdateBulanKasRequest $request, BulanKas $bulanKas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulanKas $bulanKas)
    {
        // BulanKas::destroy($bulanKas->id);

        // Session::flash('success', 'Delete Bulan Kas Success');
        
        // return redirect('/dashboard/bulanKas');
        //output value want to delete
        dd($bulanKas);
    }
}
