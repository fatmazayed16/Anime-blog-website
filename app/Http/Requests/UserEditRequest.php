<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'

        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strip_tags($this['name']),
            'first_name' => strip_tags($this['first_name']),
            'last_name' => strip_tags($this['last_name']),
            'email' => strip_tags($this['email'])
        ]);
    }
}
