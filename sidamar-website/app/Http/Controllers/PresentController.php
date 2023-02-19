<?php

namespace App\Http\Controllers;

use App\Models\Present;
use App\Http\Requests\StorePresentRequest;
use App\Http\Requests\UpdatePresentRequest;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $present = Present::all();
        // return view('present', compact('present'));

        return view('dashboard.admin.present.index',[
            "presents" => Present::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function show(Present $present)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function edit(Present $present)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresentRequest  $request
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresentRequest $request, Present $present)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function destroy(Present $present)
    {
        //
    }
}
