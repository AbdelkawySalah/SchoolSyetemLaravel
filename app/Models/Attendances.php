<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'teacher_id',
        'attendence_date',
        'attendence_status',
 
   ];

}
