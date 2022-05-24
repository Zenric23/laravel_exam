<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'contact' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],

            'date_of_birth' => ['required', 'string', 'max:255'],
            'userType' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'active' => ['required', 'string'],
            'schoolName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'date_of_birth' => $input['date_of_birth'],
            'gender' => $input['gender'],
            'userType' => $input['userType'],
            'status' => $input['status'],
            'username' => $input['username'],
            'contact' => $input['contact'],
            'address' => $input['address'],
            'email' => $input['email'],
            'schoolName' => $input['schoolName'],
            'active' => $input['active'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
