<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachSchedule extends Model {
    use HasFactory;
    public $table = 'coaches_schedule';

    protected $fillable = [
        'day',
        'from',
        'to',
        'session_duration',
        'coach_id',
    ];

    protected $appends = ['time_slot', 'blocked_times'];

    public function coach() {
        return $this->belongsTo(Coach::class);
    }

    public function getTimeSlotAttribute() {
        $start = strtotime($this->from);
        $end   = strtotime($this->to);
        $slot  = $this->session_duration * 60;
        $intervals = [];
        while ($start < $end) {
            if (($slot !== null) && ($start + $slot <= $end)) {
                $intervals[] = array('starts' => date("H:i:s", $start), 'ends' => date("H:i:s", ($start += $slot)));
            }
        }
        return $intervals;
    }

    public function getBlockedTimesAttribute() {
        $blocked_times = Book::where('coach_id', $this->coach_id)->where('day', $this->day)->pluck('time');
        return $blocked_times;
    }
    
}
