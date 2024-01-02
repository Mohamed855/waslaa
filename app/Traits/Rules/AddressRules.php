<?php

namespace App\Traits\Rules;

trait AddressRules {
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
}
