<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function messages() {
        return $this->hasMany(Message::class);
    }
    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }
    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id','id');        
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');        
    }
}
