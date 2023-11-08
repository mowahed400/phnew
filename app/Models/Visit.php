<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
        'doctor_id',
        'user_id',
        'agent_id',
        'date',
    ];
    public function doctor(){
        return  $this->belongsTo(Doctor::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function agent() {
        return $this->belongsTo(Agent::class);
    }
}
