<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'code','name','gender','birth_place','birth_date', 'faculty_id'
    ];

   public function faculty(){
       return $this->belongsTo(Faculty::class,'faculty_id');
   }
}
