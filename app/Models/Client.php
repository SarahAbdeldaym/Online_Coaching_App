<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'clients';

    protected $fillable = [
        'name_en',
        'name_ar',
        'email',
        'password',
        'mobile',
        'date_of_birth',
        'gender',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function feedbacks() {
        return $this->hasMany(Feedback::class);
    }

    public function books() {
        return $this->hasMany(Book::class);
    }
}
