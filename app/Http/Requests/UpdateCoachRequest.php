<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoachRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function rules() {
        $rules = [
            'name_en'       => 'required',
            'name_ar'       => 'required',
            'image'         => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png'],
            'date_of_birth' => 'required|date|before:01-jan-2000|after:01-jan-1920',
            'specialist_id' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'email'    => 'required|email|unique:coaches',
                'password' => ['required', 'min:8'],
            ];
        } else {   //PUT
            $rules += [
                'email'    => 'required|email|unique:coaches,email,' . $this->coach->id,
                'password' => ['nullable', 'min:8'],
            ];
        }
        return $rules;
    }
}
