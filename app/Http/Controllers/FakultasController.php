<?php

namespace App\Http\Controllers;

use App\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=Fakultas::get();
        return view('fakultas.list_fakultas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data']=Fakultas::get();
        return view('fakultas.form_fakultas', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fakultas::create([
            'kode_fk' => $request->kode_fk,
            'nama_fk' => $request->nama_fk,
            'keterangan' => $request->keterangan
                ]);
        return redirect()->route('fakultas.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=Fakultas::where('kode_fk',$id)->paginate(6);
        return view('fakultas.list_fakultas', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=Fakultas::find($id);
        return view('fakultas.form_ubah_fakultas', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Fakultas::find($id)->update(['nama_fk'=>$request->nim]);
        Fakultas::find($id)->update(['keterangan'=>$request->id]);
        return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=Fakultas::find($id)->value('kode_fk');
        Fakultas::find($id)->delete();
        return redirect()->route('fakultas.index')->with('message', 'Data berhasil di hapus');
    }
}
