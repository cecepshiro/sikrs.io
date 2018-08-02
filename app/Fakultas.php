<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table='data_fk';
    protected $primaryKey='kode_fk';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'kode_fk','nama_fk','keterangan','created_at','updated_at'
      ];
}
