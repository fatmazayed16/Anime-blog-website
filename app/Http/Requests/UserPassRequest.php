<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPassRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'current_password' => ['required'],
            'new_password' => ['required'],
            'password_confirmation' => ['same:new_password']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'current_password' => strip_tags($this->current_password),
            'new_password' => strip_tags($this->new_password),
            'password_confirmation' => strip_tags($this->password_confirmation)
        ]);
    }
}
