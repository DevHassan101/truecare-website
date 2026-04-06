<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
   
    public function conversation()
    {
        return $this->hasOne(Conversation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    public function availableTiming()
    {
        return $this->belongsTo(AvailableTiming::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
