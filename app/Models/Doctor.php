<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

//    // Relation Doctor To S Table
//    public function speciality()
//    {
//        return $this->hasMany('App\Models\Speciality', 'speciality_id');
//    }
}
