<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $certif = Certificate::where('user_id',$user->id)->get();
        return view('dashboard.certificate.index',compact('certif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255'
        // ]);

        // $validatedData['user_id'] = auth()->user()->id;

        // Certificate::create($validatedData);

        // return redirect('dashboard/certificate/create')->with('success','Sertifikat baru berhasil disimpan');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admin()
    {
        $certif = Certificate::orderBy('status', 'asc')->get();;
        return view ('dashboard.certificate.admin',compact('certif'));
    }

    public function approved($id)
    {
        try{
            Certificate::where('id', $id)->update([
                'status' => 2
            ]);
        } catch (\Exception $e){
            return redirect('/dashboard/statuscertificate')->with('success','Sertifikat berhasil diapprove');
        }

        return redirect('/dashboard/statuscertificate')->with('success','Sertifikat berhasil diapprove');
    }

}