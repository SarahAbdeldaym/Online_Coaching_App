<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NotOverlapped;

class StoreCoachScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'day'                  => 'required|date|after:today',
            'from'                 => 'required|date_format:H:i|before_or_equal:to',
            'to'                   => ['required', 'date_format:H:i', 'after:from', new NotOverlapped($this->all())],
            'session_duration'       => ['required', 'numeric'],
            'coach_id'            => ['required', 'numeric'],
        ];
    }
}
