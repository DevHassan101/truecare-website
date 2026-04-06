<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorStripe extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}