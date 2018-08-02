<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table='data_wali_mhsw';
    protected $primaryKey='kode_wali';
    public $incrementing =false;
    public $timestamps=false;
  
      protected $fillable = [
          'kode_wali','nid','nim'
      ];
}
