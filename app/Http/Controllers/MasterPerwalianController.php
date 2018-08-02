<?php

namespace App\Http\Controllers;

use App\MasterPerwalian;
use Illuminate\Http\Request;

class MasterPerwalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=MasterPerwalian::get();
        return view('perwalian.list_masterperwalian', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data']=MasterPerwalian::get();
        return view('perwalian.form_masterperwalian', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MasterPerwalian::create([
            'kode_perwalian' => $request->kode_perwalian,
            'kode_wali' => $request->kode_wali
                ]);
        return redirect()->route('master.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterPerwalian  $MasterPerwalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=MasterPerwalian::where('kode_perwalian',$id)->paginate(6);
        return view('perwalian.list_masterperwalian', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterPerwalian  $MasterPerwalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=MasterPerwalian::find($id);
        return view('perwalian.form_ubah_masterperwalian', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterPerwalian  $MasterPerwalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MasterPerwalian::find($id)->update(['kode_wali'=>$request->kode_wali]);
        return redirect()->route('master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterPerwalian  $MasterPerwalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=MasterPerwalian::find($id)->value('kode_perwalian');
        MasterPerwalian::find($id)->delete();
        return redirect()->route('master.index')->with('message', 'Data berhasil di hapus');
    }
}
