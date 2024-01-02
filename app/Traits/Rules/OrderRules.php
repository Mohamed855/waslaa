<?php

namespace App\Traits\Rules;

trait OrderRules {
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
            'deliveryNote' => 'nullable|string',
            'totalCost' => 'required|numeric|min:0',
        ];
    }
}
