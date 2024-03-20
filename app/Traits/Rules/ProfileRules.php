<?php

namespace App\Traits\Rules;

trait ProfileRules {
    protected function updateProfileRules(): array
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
                'unique:users,phone,' . auth()->id(),
                'unique:admins,phone',
                'unique:vendors,phone',
                'unique:managers,phone',
            ],
            'sec_phone' => [
                'nullable',
                'regex:/^(010|011|012|015|10|11|12|15|2010|2011|2012|2015|\+2010|\+2011|\+2012|\+2015)[0-9]{8}$/',
            ],
            'gender' => 'in:male,female',
            'lang' => 'in:en,ar',
        ];
    }
    protected function changePasswordRules(): array
    {
        return [
            'old_password' => 'required|string',
            'new_password' => 'required|min:8|max:16|string|confirmed',
        ];
    }
    protected function updateProfileImageRules(): array
    {
        return [
            'profileImage' => 'required|image|mimes:jpeg,jpg,png|max:10240',
        ];
    }
}
