<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
class Subject extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded =[];

    public function Grades(){
       return $this->belongsTo('App\Models\Grade','Grade_id');
    }

    public function ClassRooms(){
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }

    public function Teachers()
    {
        return $this->belongsTo('App\Models\Teacher','teacher_id');
    }
    
}
