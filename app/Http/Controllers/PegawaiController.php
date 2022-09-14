<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pegawai', [
            'data' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'password' => md5($request->password),
            'email' => $request->email,
        ]);
        return redirect()->back()->with(['message'=>'pegawai berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegawai  $plants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with(['message'=>'pegawai berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with(['message'=>'pegawai berhasil di delete','status'=>'success']);
    }
}
