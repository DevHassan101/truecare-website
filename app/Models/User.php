<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'qbid',
        'name',
        'email',
        'password',
        'gender',
        'dob',
        'address',
        'uid',
        'contact_number',
        'profile_image',
        'specialization',
        'qualifications',
        'years_of_experience',
        'appointment_fees',
        'languages',
        'country_id',
        'state_id',
        'city',
        'available_full_time',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFormattedAgeAttribute()
    {
        $dob = Carbon::parse($this->dob);
        $now = Carbon::now();

        $years = $dob->diffInYears($now);
        $months = $dob->diffInMonths($now) % 12;

        return sprintf('%02d years %02d months', $years, $months);
    }
    public function getFormattedExperiencedAttribute()
    {
        $yearsOfExperience = $this->years_of_experience; // 5
        $now = Carbon::now();

        $years = $yearsOfExperience->diffInYears($now);
        $months = $yearsOfExperience->diffInMonths($now) % 12;

        return sprintf('%02d years %02d months', $years, $months);
    }
    public function availableTimings()
    {
        return $this->hasMany(AvailableTiming::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
    public function getRatingsAttribute()
    {
        $appointments = $this->appointments()->where('status', 'completed');

        $count = $appointments->count();
        $sum = $appointments->sum('stars');

        if ($count === 0) {
            return [
                'count' => 0,
                'average' => 0,
            ];
        }

        return [
            'count' => $count,
            'average' => round($sum / $count, 1),
        ];
    }

    public function stripe() {
        return $this->hasOne(DoctorStripe::class, 'doctor_id');
    }
    public function canReceivePayments()
    {
        return $this->stripe?->stripe_charges_enabled && $this->stripe?->stripe_payouts_enabled;
    }
}
