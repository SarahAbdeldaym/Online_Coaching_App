<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = [
        'coach_id',
        'client_id',
        'day',
        'fees',
        'confirm',
        'time',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
