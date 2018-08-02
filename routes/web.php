<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'web'], function(){
    //redirect to login
    Route::auth();
  });

// Auth::routes();
Route::group(['middleware' => ['web','auth']], function(){
    //redirect to login
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', function(){
      if(Auth::user()->hak_akses==0){
        return view('admin.home');
      }elseif(Auth::user()->hak_akses==1){
        return view('dosen.home');
      }elseif(Auth::user()->hak_akses==2){
        return view('mahasiswa.home');
      }
    });
  });

Route::get('hak_akses', ['middleware' => ['web','auth','hak_akses'],function () {
    return view('welcome');
}]);

Route::resource('mahasiswa','MahasiswaController');
Route::resource('fakultas','FakultasController');
Route::resource('jurusan','JurusanController');
Route::resource('dosen','DosenController');
Route::resource('matakuliah','MataKuliahController');
Route::get('select2-autocomplete-ajax', 'SearchController@dataAjax');
Route::get('select_mhsw', 'SearchController@dataMhsw');
Route::get('select_kodewali', 'SearchController@kodeWali');
Route::resource('wali','WaliController');
Route::resource('perwalian','PerwalianController');
Route::resource('master','MasterPerwalianController');
Route::get('addperwalian', 'PerwalianController@tambahPerwalian');
Route::get('formperwalian', 'PerwalianController@formPerwalian');
Route::get('hapus', 'PerwalianController@hapus');