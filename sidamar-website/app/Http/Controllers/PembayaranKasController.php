<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembayaranKasRequest;
use App\Http\Requests\UpdatePembayaranKasRequest;
use App\Models\PembayaranKas;
use App\Models\BulanKas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class PembayaranKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bulanKas = BulanKas::find($bulanKasId);

        // if($bulanKas){
        //     abort(404, 'Error 404: Bulan Kas not found');
        // }

        // $pembayaranKas = PembayaranKas::where('bulan_kas_id', $bulanKas->id )->get();
        // return view('dashboard.pembayaranKas.index', [
        //     'pembayaranKas' => $pembayaranKas,
        //     'bulanKas' => $bulanKas,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bulanKasId)
    {
        // //get bulanKasId from url
        // $bulanKas = BulanKas::findorFail($bulanKasId);
        // return view('dashboard.pembayaranKas.create',[
        //     'bulanKas' => $bulanKas,
        //     'bulanKasId' => $bulanKasId,
        // ]);
        // Check if $bulanKasId is null or empty
        //---------------------------------------
        if (!$bulanKasId) {
            return redirect()->back()->with('error', 'Invalid parameter value');
        }

        return view('dashboard.pembayaranKas.create',[
            'bulanKas' => BulanKas::find($bulanKasId),
            'bulanKasId' => $bulanKasId,
        ]);
        $bulanKas = BulanKas::find($bulanKasId);
        if (!$bulanKas) {
            Session::flash('error', 'Bulan Kas tidak ditemukan!');
            return redirect()->back();
        }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembayaranKasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembayaranKasRequest $request)
    {
        //return $request->all();
        $pembayaranKas = new PembayaranKas;
        $pembayaranKas->user_id = auth()->user()->id;
        $pembayaranKas->bulan_kas_id = $request->bulan;
        $pembayaranKas->metode_pembayaran = $request->validate(
            [
                'metode' => 'required',
            ]);
        $pembayaranKas->metode_pembayaran = $request->input('metode');
        // handle file upload and save the path to the database
        if ($request->hasFile('bukti')) {
            $request->validate([
                'bukti' => 'max:2048'
            ]);
            $path = $request->file('bukti')->store('public/bukti');
            $pembayaranKas->bukti = $path;
            // max file size 2MB
        }
        $pembayaranKas->jumlah = 200000;
        $pembayaranKas->status = 'success';

        //check if user already paid
        $check = PembayaranKas::where('bulan_kas_id', $request->bulan)->where('user_id', auth()->user()->id)->first();
        if($check){
            Session::flash('error', 'Anda sudah membayar kas bulan ini!');
            return redirect('/dashboard/pembayaranKas/'.$pembayaranKas->bulan_kas_id);
        }
        $pembayaranKas->save();
        Session::flash('success', 'Pembayaran Kas berhasil ditambahkan!');
        return redirect('/dashboard/pembayaranKas/'.$pembayaranKas->bulan_kas_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembayaranKas  $pembayaranKas
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranKas $pembayaranKas, $bulanKasId)
    {
        $bulanKas = BulanKas::find($bulanKasId);
        //dd($bulanKas);
        $pembayaranKas = PembayaranKas::where('bulan_kas_id', $bulanKas->id )->get();
        //dd($pembayaranKas);
        return view('dashboard.pembayaranKas.show',[
            'pembayaranKas' => $pembayaranKas,
            'bulanKas' => $bulanKas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranKas  $pe nmbayaranKas
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranKas $pembayaranKas)
    {
        return view('dashboard.pembayaranKas.edit', [
            'pembayaranKas' => $pembayaranKas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembayaranKasRequest  $request
     * @param  \App\Models\PembayaranKas  $pembayaranKas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembayaranKasRequest $request, $id)
    {
        //get the pembayaranKas at id
        $pembayaranKas = PembayaranKas::find($id);
            

        if($request->status == 'pending'){
            $pembayaranKas->status = 'success';
            $pembayaranKas->save();
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranKas  $pembayaranKas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaranKas = PembayaranKas::find($id);
        //dd($bulanKas);
        
        $pembayaranKas->delete();
        Session::flash('success', 'Delete Pembayaran Kas Success');
        return redirect()->back();
    }
}
