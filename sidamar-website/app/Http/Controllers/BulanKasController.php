<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBulanKasRequest;
use App\Http\Requests\UpdateBulanKasRequest;
use App\Models\BulanKas;

class BulanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bulan_kas.index', [
            'bulan_kas' => BulanKas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bulan_kas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBulanKasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulanKasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function show(BulanKas $bulanKas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulanKas  $bulanKas
     * @return \Illuminate\Http\Response
     */
    public function edit(BulanKas $bulanKas)
    {
        //
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
        //
    }
}
