<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArsipFilmRequest;
use App\Http\Requests\UpdateArsipFilmRequest;
use App\Models\ArsipFilm;
use Illuminate\Support\Facades\Session;

class ArsipFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.arsipFilm.index', [
            'arsipFilm' => ArsipFilm::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.arsipFilm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArsipFilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArsipFilmRequest $request)
    {
        //get the request
        $validatedData = $request->validate([
            'produser' => 'required|min:5|max:100',
            'sutradara' => 'required|min:5|max:100',
            'distributor' => 'required|min:5|max:100',
            'email' => 'required|email:dns',
            'no_telepon' => 'required|numeric|digits_between:10,13',
            'medsos' => 'required',
            'rumah_produksi' => 'required',
            'judul_film' => 'required',
            'tahun_produksi' => 'required|numeric|digits:4',
            'durasi' => 'required|numeric|digits_between:1,3',
            'kategori' => 'required',
            'link_film' => 'required|url',
            //take value from checkbox pernyataan
            'pernyataan' => 'required',
        ]);

        //store the request
        ArsipFilm::create($validatedData);
        Session::flash('success', 'Data berhasil ditambahkan');
        return redirect()('dashboard.arsipFilm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function show(ArsipFilm $arsipFilm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function edit(ArsipFilm $arsipFilm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArsipFilmRequest  $request
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArsipFilmRequest $request, ArsipFilm $arsipFilm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArsipFilm $arsipFilm)
    {
        //
    }
}
