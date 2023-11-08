<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable=['name','user_id'];




    public function user() {
        return $this->belongsTo(User::class);
    }
    public function doctor(){
        return $this->hasMany(doctor::class);
    }
    public function visits() {
        return $this->hasMany(Visit::class);
    }
}
