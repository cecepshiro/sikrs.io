<?php

namespace App\Http\Controllers;

use App\Perwalian;
use App\Matakuliah;
use Illuminate\Http\Request;

class PerwalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=Perwalian::get();
        return view('perwalian.list_perwalian', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data']=Perwalian::get();
        return view('perwalian.form_perwalian', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $id = $request->kode_perwalian;
        // foreach($request->input('kode_mk') as $key => $value) {
        //     Perwalian::create([
        //         'kode_perwalian' => $request->kode_perwalian,
        //         'kode_mk' => $value
        //     ]);
        // }
        $id = $request->kode_perwalian;
        foreach($request->kode_mk as $kodemk){
            $data = new Perwalian;
            $data->kode_perwalian = $request->kode_perwalian;
            $data->kode_mk = $kodemk;
            $data->save();

        }
        return redirect()->route('perwalian.show', $id)->with('message', 'Data berhasil diinput');

       // dd($request->kode_perwalian);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perwalian  $Perwalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cari = $id;
        $data =Perwalian::where('kode_perwalian',$cari)->get();
        return view('perwalian.list_perwalian', compact('data'))->with('cari', $cari);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perwalian  $Perwalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=Perwalian::find($id);
        return view('perwalian.form_ubah_perwalian', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perwalian  $Perwalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kode = $request->kode_perwalian;
        Perwalian::find($id)->update(['status'=>$request->status]);
        return redirect()->route('perwalian.show', $kode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perwalian  $Perwalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp=Perwalian::find($id)->value('kode_perwalian');
        Perwalian::find($id)->delete();
        return redirect()->route('perwalian.index')->with('message', 'Data berhasil di hapus');
    }

    public function hapus(Request $request)
    {
        $id = $request->get('search');
        $kode = $request->get('search2');
        Perwalian::find($id)->delete();
        return redirect()->route('perwalian.show', $kode)->with('message', 'Data berhasil di hapus');
    }

    public function tambahPerwalian(Request $request)
    {   
        $cari = $request->get('search');
        $data = Perwalian::where('kode_perwalian', $cari)->get();
        return view('perwalian.list_perwalian', compact('data'))->with('cari', $cari);
    }

    public function formPerwalian(Request $request)
    {   
        $cari = $request->get('search');
        $data = Matakuliah::get();
        return view('perwalian.form_perwalian', compact('data'))->with('cari', $cari);
    }
}
