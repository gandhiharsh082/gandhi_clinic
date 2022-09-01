<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patientdetail extends Model
{
    protected $fillable=['patient_id','co','do','rx','fee','image'];
    
     public function patient (){
        return $this->belongsTo(Patient::class);
    }
}
