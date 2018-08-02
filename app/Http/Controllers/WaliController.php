<?php

namespace App\Http\Controllers;

use App\Wali;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=Wali::get();
        return view('wali.list_wali', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data']=Wali::get();
        return view('wali.form_wali', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Wali::create([
            'kode_wali' => $request->kode_wali,
            'nid' => $request->nid,
            'nim' => $request->nim
                ]);
        return redirect()->route('wali.index')->with('message', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wali  $Wali
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=Wali::where('kode_wali',$id)->paginate(6);
        return view('wali.list_wali', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wali  $Wali
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=Wali::find($id);
        return view('wali.formubah_wali', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wali  $Wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Wali::find($id)->update(['nid'=>$request->nid]);
        Wali::find($id)->update(['nim'=>$request->nim]);
        return redirect()->route('wali.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wali  $Wali
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=Wali::find($id)->value('kode_wali');
        Wali::find($id)->delete();
        return redirect()->route('wali.index')->with('message', 'Data berhasil di hapus');
    }
}
