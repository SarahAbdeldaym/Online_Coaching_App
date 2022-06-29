<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'coach_id',
        'rate',
        'comment',
    ];

    protected $table = 'feedbacks';

    //Relationship Between Coach and Feedback
    public function coach() {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    //Relationship Between Client and Feedback
    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }
}