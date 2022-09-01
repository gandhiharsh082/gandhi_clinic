<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable=['name','age','gender','phone','address','image'];
    
      public function Patientdetail (){
        return $this->hasMany(Patientdetail::class);
    }
}
