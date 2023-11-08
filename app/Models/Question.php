<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'question',
        'correct_answer',
        'type_id'
    ];
    public function questionType(){
       return  $this->belongsTo(QuestionType::class,'type_id','id');
    }
}

