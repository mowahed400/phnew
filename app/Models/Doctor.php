<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','agent_id'
    ];


    public function agent(){
        return $this->belongsTo(Agent::class);
    }
    public function visit() {
        return $this->hasMany(Visit::class);
    }
}
