<?php

namespace App\Actions\Company;

use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class UpdateUserProfileInformation
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
        ])->validate();

        return Company::create([
            'name' => $input['name'],
            'email' => $input['email'],
        ]);
    }
}
