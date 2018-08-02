<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table='data_mk';
    protected $primaryKey='kode_mk';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'kode_mk','nama_mk','nid','jumlah_sks','created_at','updated_at'
      ];
}
