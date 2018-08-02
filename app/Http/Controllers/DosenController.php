<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Jurusan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=Dosen::get();
        return view('dosen.list_dosen', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan['jurusan']=Jurusan::get();
        return view('dosen.form_dosen', $jurusan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dosen::create([
            'nid' => $request->nid,
            'id' => $request->id,
            'kode_jur' => $request->kode_jur,
            'nama_dosen' => $request->nama_dosen,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
                ]);
        return redirect()->route('dosen.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $Dosen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=Dosen::where('nid',$id)->paginate(6);
        return view('dosen.list_dosen', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $Dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=Dosen::find($id);
        return view('dosen.form_ubah_dosen', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $Dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Dosen::find($id)->update(['nid'=>$request->nim]);
        Dosen::find($id)->update(['id'=>$request->id]);
        Dosen::find($id)->update(['kode_jur'=>$request->kode_jur]);
        Dosen::find($id)->update(['nama_dosen'=>$request->nama_dosen]);
        Dosen::find($id)->update(['tempat_lahir'=>$request->tempat_lahir]);
        Dosen::find($id)->update(['tgl_lahir'=>$request->tgl_lahir]);
        Dosen::find($id)->update(['jenis_kelamin'=>$request->jenis_kelamin]);
        Dosen::find($id)->update(['agama'=>$request->agama]);
        Dosen::find($id)->update(['alamat'=>$request->alamat]);
        Dosen::find($id)->update(['no_telp'=>$request->no_telp]);
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $Dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=Dosen::find($id)->value('nid');
        Dosen::find($id)->delete();
        return redirect()->route('dosen.index')->with('message', 'Data berhasil di hapus');
    }
}
