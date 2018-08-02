<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
    	$data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("data_dosen")
            		->select("nid","nama_dosen")
            		->where('nama_dosen','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }

    public function dataMhsw(Request $request)
    {
    	$data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("data_mahasiswa")
            		->select("nim","nama")
            		->where('nim','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }

    public function kodeWali(Request $request)
    {
    	$data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("data_wali_mhsw")
            		->select("kode_wali","nim")
            		->where('nim','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }

    
}
