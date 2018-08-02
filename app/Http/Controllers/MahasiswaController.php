<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=Mahasiswa::get();
        return view('mahasiswa.list_mahasiswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan['jurusan']=Jurusan::get();
        return view('mahasiswa.form_mahasiswa', $jurusan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mahasiswa::create([
            'nim' => $request->nim,
            'id' => $request->id,
            'kode_jur' => $request->kode_jur,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
                ]);
        return redirect()->route('mahasiswa.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=Mahasiswa::where('nim',$id)->paginate(6);
        return view('mahasiswa.list_mahasiswa', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=Mahasiswa::find($id);
        return view('mahasiswa.form_ubah_mahasiswa', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mahasiswa::find($id)->update(['nim'=>$request->nim]);
        Mahasiswa::find($id)->update(['id'=>$request->id]);
        Mahasiswa::find($id)->update(['kode_jur'=>$request->kode_jur]);
        Mahasiswa::find($id)->update(['nama'=>$request->nama]);
        Mahasiswa::find($id)->update(['tempat_lahir'=>$request->tempat_lahir]);
        Mahasiswa::find($id)->update(['tgl_lahir'=>$request->tgl_lahir]);
        Mahasiswa::find($id)->update(['jenis_kelamin'=>$request->jenis_kelamin]);
        Mahasiswa::find($id)->update(['agama'=>$request->agama]);
        Mahasiswa::find($id)->update(['alamat'=>$request->alamat]);
        Mahasiswa::find($id)->update(['no_telp'=>$request->no_telp]);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=Mahasiswa::find($id)->value('nim');
        Mahasiswa::find($id)->delete();
        return redirect()->route('mahasiswa.index')->with('message', 'Data berhasil di hapus');
    }
}
