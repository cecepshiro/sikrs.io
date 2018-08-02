<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table='data_jurusan';
    protected $primaryKey='kode_jur';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'kode_jur','nama_jur','keterangan','kode_fk','created_at','updated_at'
      ];
}
