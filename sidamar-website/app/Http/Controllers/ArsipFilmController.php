<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArsipFilmRequest;
use App\Http\Requests\UpdateArsipFilmRequest;
use App\Models\ArsipFilm;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
        //there are 2 page create
        //1. create from index
        //2. create from page /arsipFilm
        return view('dashboard.arsipFilm.create');

    }

    public function create2()
    {
        return view('dashboard.arsipFilm.create2');
    }
    public function store2(StoreArsipFilmRequest $request)
    {
        //get the request
        $validatedData = $request->validate([
            'produser' => 'required|min:5|max:100',
            'sutradara' => 'required|min:5|max:100',
            'distributor' => 'required|min:5|max:100',
            'email' => 'required|email:dns',
            'nomor_telepon' => 'required|numeric|digits_between:10,13',
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
        Session::flash('success', 'Arsip Film Berhasil Ditambahkan');
        
        return redirect('dashboard.arsipFilm.index');
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
            // 'user_id' => 'required',
            'produser' => 'required|min:5|max:100',
            'sutradara' => 'required|min:5|max:100',
            'distributor' => 'required|min:5|max:100',
            'email' => 'required|email:dns',
            'nomor_telepon' => 'required|numeric|digits_between:10,13',
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
        // dd($validatedData);
        ArsipFilm::create($validatedData);
        //ArsipFilm::create($validatedData);
        //if the previous page is create, then redirect to index
        
        //else redirect to show
        //get the route from this page
        //dd(url()->previous());
        $previous = url()->previous();
        if ($previous == 'http://sidamar-website.test/dashboard/arsipFilm/create') {
            //dd($arsipFilm->id);
            Session::flash('success', 'Arsip Film Berhasil Ditambahkan');
            return redirect('/dashboard/arsipFilm');
            
        } elseif ($previous == 'http://sidamar-website.test/arsipFilm') {
            Session::flash('success', 'Arsip Film Berhasil Ditambahkan, Terima kasih sudah mengisi form, Hubungi admin jika mengalami kendala');
            return redirect('/arsipFilm/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function show(ArsipFilm $arsipFilm, $id, Request $request)
    {
        //find id from route
        $id = $request->route('id');
        $arsipFilm = ArsipFilm::find($id);
        //get each data

        return view('dashboard.arsipFilm.show', [
            'arsipfilm' => $arsipFilm,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function edit(ArsipFilm $arsipFilm)
    {
        return view('dashboard.arsipFilm.edit', [
            'arsipfilm' => $arsipFilm,
        ]);
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
        //get the request
        
        $validatedData = $request->validate([
            'produser' => 'required|min:5|max:100',
            'sutradara' => 'required|min:5|max:100',
            'distributor' => 'required|min:5|max:100',
            'email' => 'required|email:dns',
            'nomor_telepon' => 'required|numeric|digits_between:10,13',
            'medsos' => 'required',
            'rumah_produksi' => 'required',
            'judul_film' => 'required',
            'tahun_produksi' => 'required|numeric|digits:4',
            'durasi' => 'required|numeric|digits_between:1,3',
            'kategori' => 'required',
            'link_film' => 'required|url',
            'pernyataan' => 'required',
            //take value from checkbox pernyataan
        ]);

        //update the request
        ArsipFilm::where('id', $arsipFilm->id)
            ->update($validatedData);
        Session::flash('success', 'Arsip Film Berhasil Diubah');
        return redirect('/dashboard/arsipFilm/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArsipFilm  $arsipFilm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArsipFilm $arsipFilm)
    {
        ArsipFilm::destroy($arsipFilm->id);
        Session::flash('success', 'Arsip Film Berhasil Dihapus');
        return redirect('/dashboard/arsipFilm/');
    }
}
