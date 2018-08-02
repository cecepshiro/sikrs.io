<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Fakultas;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=Jurusan::get();
        return view('jurusan.list_jurusan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas['fakultas']=Fakultas::get();
        return view('jurusan.form_jurusan', $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jurusan::create([
            'kode_jur' => $request->kode_jur,
            'nama_jur' => $request->nama_jur,
            'keterangan' => $request->keterangan,
            'kode_fk' => $request->kode_fk
                ]);
        return redirect()->route('jurusan.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=Jurusan::where('kode_jur',$id)->paginate(6);
        return view('jurusan.list_jurusan', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=Jurusan::find($id);
        return view('jurusan.form_ubah_jurusan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jurusan::find($id)->update(['nama_jur'=>$request->nama_jur]);
        Jurusan::find($id)->update(['keterangan'=>$request->keterangan]);
        Jurusan::find($id)->update(['kode_fk'=>$request->kode_fk]);
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=Jurusan::find($id)->value('kode_jur');
        Jurusan::find($id)->delete();
        return redirect()->route('jurusan.index')->with('message', 'Data berhasil di hapus');
    }
}
