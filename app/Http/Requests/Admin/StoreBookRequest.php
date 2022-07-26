<?php

namespace App\Http\Requests\Admin;

use App\Rules\AppointmentsOverlap;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\InRange;

class StoreBookRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'coach_id'    => 'required|numeric',
            'client_id'   => ['required', 'numeric'],
            'day'         => ['required', 'date'],
            'fees'        => ['required', 'numeric'],
            'time'        => ['required', 'date_format:H:i', new InRange($this->all()), new AppointmentsOverlap($this->all())],
        ];
    }
}
