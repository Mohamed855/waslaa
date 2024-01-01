<?php

namespace App\Traits\Rules;

use Illuminate\Support\Facades\DB;

trait ActionsRules {
    protected function addAddressRules(): array
    {
        return [
            'city' => 'required|exists:cities,id',
            'address' => 'required|max:200|string',
            'building' => 'required|numeric',
            'floor' => 'required|numeric',
            'flat' => 'required|numeric',
            'special_mark' => 'required|max:200|string',
        ];
    }
    protected function updateProfileRules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:60', function ($attribute, $value, $fail) {
                $names = explode(' ', $value);
                if (count($names) < 2)
                    $fail('You must enter your first and last name at least.');
            }],
            'phone' => [
                'required',
                'regex:/^(010|011|012|015|10|11|12|15|2010|2011|2012|2015|\+2010|\+2011|\+2012|\+2015)[0-9]{8}$/',
                'unique:users,phone' . auth()->id(),
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
    protected function addToCartRules(): array
    {
        return [
            'product' => 'required|exists:products,id',
            'type' => 'required|numeric',
            'quantity' => 'required|numeric',
        ];
    }
    protected function confirmOrderRules(): array
    {
        return [
            'vendor' => 'required',
            'vendor.name' => 'required|string',
            'vendor.avatar' => 'required|string',
            'products' => 'required|array',
            'products.*' => 'required',
            'products.*.name' => 'required|string',
            'products.*.type' => 'required|string',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.price' => 'required|numeric|min:0',
            'address' => 'required|string',
            'deliveryPhone' => 'required|exists:users,delivery_phone',
            'payMethod' => 'required|in:cash,card',
            'deliveryMethod' => 'required|in:delivery,pickup',
            'deliveryNote' => 'required|string',
            'totalCost' => 'required|numeric|min:0',
        ];
    }
}
