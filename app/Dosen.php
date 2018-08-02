<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table='data_dosen';
    protected $primaryKey='nid';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'nid','id','kode_jur','nama_dosen','tempat_lahir','tgl_lahir','jenis_kelamin','agama','alamat','no_telp','created_at','updated_at'
      ];
}
