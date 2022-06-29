<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $table = 'specialists';

    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    //Relationship of Specialist with Coaches
    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }
}
