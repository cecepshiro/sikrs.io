<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table='data_mahasiswa';
    protected $primaryKey='nim';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'nim','id','kode_jur','nama','tempat_lahir','tgl_lahir','jenis_kelamin','agama','alamat','no_telp','created_at','updated_at'
      ];
}
