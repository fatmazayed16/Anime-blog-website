<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender'=>['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
            $input['gender'] == 'male'? $path = 'image\user.png' : $path = 'image\female.jpg';
        return User::create([
            'name' => $input['name'],
            'first_name' =>$input['first_name'],
            'last_name' => $input['last_name'],
            'image_path'=> $path,
            'gender' => $input['gender'],
            'email' => $input['email'],
            'status' => 'basic',
            'password' => Hash::make($input['password']),
        ]);
    }
}
