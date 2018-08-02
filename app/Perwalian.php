<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    protected $table='data_perwalian';
    protected $primaryKey='no';
    public $incrementing =false;
    public $timestamps=true;
  
      protected $fillable = [
          'no','kode_perwalian','kode_mk','status','created_at','updated_at'
      ];
}
