<?php

namespace App\Traits\Rules;

use Illuminate\Support\Facades\DB;

trait AuthRules {
    protected function signUpRules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:60', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter first and last name at least');
            }],
            'phone' => [
                'required',
                'regex:/^(010|011|012|015|10|11|12|15|2010|2011|2012|2015|\+2010|\+2011|\+2012|\+2015)[0-9]{8}$/',
                'unique:users,phone',
                'unique:admins,phone',
                'unique:vendors,phone',
                'unique:managers,phone',
            ],
            'sec_phone' => [
                'nullable',
                'regex:/^(010|011|012|015|10|11|12|15|2010|2011|2012|2015|\+2010|\+2011|\+2012|\+2015)[0-9]{8}$/',
            ],
            'password' => 'required|min:8|max:16|string|confirmed',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|max:200|string',
            'building' => 'required|numeric',
            'floor' => 'required|numeric',
            'flat' => 'required|numeric',
            'special_mark' => 'required|max:200|string',
            'gender' => 'in:male,female',
            'lang' => 'in:en,ar',
        ];
    }

    protected function signInRules(): array
    {
        return [
            'phone' => [
                'required',
                'regex:/^(010|011|012|015|10|11|12|15|2010|2011|2012|2015|\+2010|\+2011|\+2012|\+2015)[0-9]{8}$/',
            ],
            'password' => 'required|string',
        ];
    }

    protected function resetRules(): array
    {
        return [
            'phone' => [
                'required',
                'regex:/^(010|011|012|015|10|11|12|15|2010|2011|2012|2015|\+2010|\+2011|\+2012|\+2015)[0-9]{8}$/',
                'exists:users,phone',
            ],
        ];
    }

    protected function updatePasswordRules(): array
    {
        return [
            'token' => ['required', function ($attribute, $value, $fail) {
                $token = DB::table('password_reset_tokens')->where('token', $value)->first();
                if (!$token || $token->created_at < now()->subHour()) {
                    $fail('The password reset token is not valid');
                }
            }],
            'password' => 'required|min:8|max:16|string|confirmed',
        ];
    }
}
