<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_students extends Model
{
    use HasFactory;
    public function students(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
}
