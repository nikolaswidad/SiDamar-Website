<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Charts\KasChart;
use App\Charts\UserChart;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserChart $userChart)
    {
        $user = User :: all();
        return view('dashboard.user.index',[
            'users' => $user,
            'userChart' => $userChart->build(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:60'],
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'role' => 'required',
            'tahun' => 'required',
        ]);
        $validatedData['profile_photo'] = public_path('img/logo2.png');
        if ($validatedData['role'] == 'admin') {
            $validatedData['is_admin'] = 1;
            $validatedData['is_author'] = 1;
        } elseif ($validatedData['role'] == 'author') {
            $validatedData['is_admin'] = 0;
            $validatedData['is_author'] = 1;
        } elseif ($validatedData['role'] == 'user') {
            $validatedData['is_admin'] = 0;
            $validatedData['is_author'] = 0;
        }
        // create user
        User::create($validatedData);
        return redirect('/dashboard/user')->with('success', 'User Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        $user = User :: find($id);
        return view('/dashboard/user/show',[
            'user' => $user,
            'id' => $user->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User :: find($id);
        return view('/dashboard/user/edit',[
            'user' => $user,
            'id' => $user->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required', 'max:60',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'role' => 'required',
            'tahun' => 'required',
        ]);
        if ($validatedData['role'] == 'admin') {
            $validatedData['is_admin'] = 1;
            $validatedData['is_author'] = 1;
        } elseif ($validatedData['role'] == 'author') {
            $validatedData['is_admin'] = 0;
            $validatedData['is_author'] = 1;
        } elseif ($validatedData['role'] == 'user') {
            $validatedData['is_admin'] = 0;
            $validatedData['is_author'] = 0;
        }
        // masukkan $validatedData ke variabel $data tanpa memasukkan kolom role
        $data['name'] = $validatedData['name'];
        $data['email'] = $validatedData['email'];
        $data['password'] = $validatedData['password'];
        $data['is_admin'] = $validatedData['is_admin'];
        $data['is_author'] = $validatedData['is_author'];
        $data['tahun_bergabung'] = $validatedData['tahun'];

        // create user
        User::where('id', $user->id)
            ->update($data);
        return redirect('/dashboard/user')->with('success', 'User Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        //delete user from other table
        return redirect('/dashboard/user')->with('success', 'User Berhasil Dihapus');
    }
}
