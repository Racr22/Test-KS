<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $dates = ['ended_at'];

    public function patient(){
        return $this->belongsTo('App\Models\Patient','patient_id');
    } 
    public function dentist(){
        return $this->belongsTo('App\Models\Dentist','dentist_id');
    } 
}
