<?php

namespace App\Http\Controllers;

use App\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=MataKuliah::get();
        return view('matakuliah.list_matakuliah', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data']=MataKuliah::get();
        return view('matakuliah.form_matakuliah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'nid' => $request->nid,
            'jumlah_sks' => $request->jumlah_sks
                ]);
        return redirect()->route('matakuliah.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MataKuliah  $MataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=MataKuliah::where('kode_mk',$id)->paginate(6);
        return view('matakuliah.list_matakuliah', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MataKuliah  $MataKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=MataKuliah::find($id);
        return view('matakuliah.formubah_matakuliah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MataKuliah  $MataKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MataKuliah::find($id)->update(['nama_mk'=>$request->nama_mk]);
        MataKuliah::find($id)->update(['nid'=>$request->nid]);
        MataKuliah::find($id)->update(['jumlah_sks'=>$request->jumlah_sks]);
        return redirect()->route('matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataKuliah  $MataKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=MataKuliah::find($id)->value('kode_mk');
        MataKuliah::find($id)->delete();
        return redirect()->route('matakuliah.index')->with('message', 'Data berhasil di hapus');
    }
}
