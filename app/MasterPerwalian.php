<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPerwalian extends Model
{
    protected $table='data_master_perwalian';
    protected $primaryKey='kode_perwalian';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'kode_perwalian','kode_wali','created_at','updated_at'
      ];
}
