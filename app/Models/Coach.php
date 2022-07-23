<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coach extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'coaches';

    protected $fillable = [
        'name_en',
        'name_ar',
        'email',
        'password',
        'image',
        'specialist_id',
        'country_id',
        'city_id',
        'district_id',
        'gender',
        'session_time',
        'address_en',
        'address_ar',
        'fees',
        'mobile',
        'date_of_birth',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['total_rate', 'age'];

    //Relationship of Coach With Specialist
    public function specialist() {
        return $this->belongsTo(Specialist::class, 'specialist_id', 'id');
    }

    //Relationship of Coach with Feedback
    public function feedbacks() {
        return $this->hasMany(Feedback::class, 'coach_id');
    }

    //Relationship of Coach with Country
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    //Relationship of Coach with City
    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    //Relationship of Coach with District
    public function district() {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    //Total Rate of Coach
    public function getTotalRateAttribute() {
        $totalRates  = $this->feedbacks->sum('rate');
        $rates_count = $this->feedbacks->count('*');
        if ($totalRates == 0 && $rates_count == 0) {
            return 0;
        }
        $rate = number_format((float)$totalRates / $rates_count, 1, '.', '');
        return $rate;
    }

    public function getAgeAttribute() {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function books() {
        return $this->hasMany(Book::class);
    }
}
