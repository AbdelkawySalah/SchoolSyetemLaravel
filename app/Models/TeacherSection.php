<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSection extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo(Sections::class);

    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);

    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);

    }

     // علاقة فصول المدرسين لجلب الاختبارات المتعلقة بكل مدرس للفصل
     public function quizzes()
     {
         return $this->hasMany('App\Models\Quizze', 'teachersect_id');
     }

}
