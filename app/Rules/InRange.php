<?php

namespace App\Rules;

use App\Models\Book;
use App\Models\CoachSchedule;
use Illuminate\Contracts\Validation\Rule;

class InRange implements Rule {

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
        $inRange = CoachSchedule::query()
            ->where('coach_id',  $this->data['coach_id'])
            ->where('day', $this->data['day'])
            ->where('from', '<=', $this->data['time'])
            ->where('to', '>', $this->data['time'])->exists();
        return $inRange;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return "The selected coach doesn't have a schedule matching that time to create an appointment.";
    }
}
