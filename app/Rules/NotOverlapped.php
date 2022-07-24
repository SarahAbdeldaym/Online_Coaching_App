<?php

namespace App\Rules;

use App\Models\CoachSchedule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Session;

class NotOverlapped implements Rule {

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
            $overlapExist = CoachSchedule::query()
            ->where('id', '!=', $this->data['id'])
            ->where('coach_id',  $this->data['coach_id'])
            ->where('day', $this->data['day'])
            ->whereBetween($attribute, [request()->from, request()->to])->exists();
        }else{
            $overlapExist = CoachSchedule::query()
            ->where('coach_id',  $this->data['coach_id'])
            ->where('day', $this->data['day'])
            ->whereBetween($attribute, [request()->from, request()->to])->exists();
        }
        return !$overlapExist;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'The selected period is overlapping with either starting time or ending time of other another schedule.';
    }
}
