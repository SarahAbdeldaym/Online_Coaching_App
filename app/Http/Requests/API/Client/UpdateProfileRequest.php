<?php

namespace App\Http\Requests\API\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $rules = [
            'name_en'  => 'required',
            'name_ar'  => 'required',
            'password' => ['required', 'min:8'],
            'password_confirm' => ['required', 'same:password'],
            'date_of_birth' => ['required','date'],
            'gender' => 'required',
            
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'email'    => 'required|email|unique:clients',
                'mobile'  => 'required','unique:clients'
            ];
        } 
        else {   //PUT
            $rules += [
                'email'    => 'required|email|unique:clients,id,' . $this->client->id,
                'mobile'  => 'required','unique:clients,id,'. $this->client->id
            ];
        }

        if ($this->hasfile('image')) {
            $rules += [
                'image'    => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png'],
            ];
        }   
        

        return $rules;
    }
}
