<?php

namespace App\Rules;

use App\Models\Book;
use App\Models\CoachSchedule;
use Illuminate\Contracts\Validation\Rule;

class AppointmentsOverlap implements Rule {

    private $data;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        if(!empty($this->data['id'])){
            $overlapExist = Book::query()
            ->where('id', '!=', $this->data['id'])
            ->where('coach_id',  $this->data['coach_id'])
            ->where('day', $this->data['day'])
            ->where('time', $this->data['time'])->exists();
        }else{
            $overlapExist = Book::query()
            ->where('coach_id',  $this->data['coach_id'])
            ->where('day', $this->data['day'])
            ->where('time', $this->data['time'])->exists();
        }
        return !$overlapExist;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'This appointment time is already taken, please choose another period';
    }
}
