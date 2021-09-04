<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded =[];
    public function Teacher(){
        return $this->belongsto('App\Models\Teacher','teacher_id');
    }

    public function Grades(){
        return $this->belongsto('App\Models\Grade','Grade_id');
    }

    public function ClassRoom(){
        return $this->belongsto('App\Models\Classroom','Classroom_id');
    }

    public function Sections(){
        return $this->belongsto('App\Models\Sections','section_id');
    }

}
