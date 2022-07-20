<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest {
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
            'email'         => ['nullable', 'email', 'unique:clients,id,' . $this->client->id],
            'password'      => ['nullable', 'min:8'],
            'mobile'        => ['nullable', 'unique:clients,id,' . $this->client->id],
            'date_of_birth' => ['nullable','date'],
            'image'         => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }
}
