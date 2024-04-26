<?php

namespace App\Traits\Rules;

trait CartRules {
    protected function addToCartRules(): array
    {
        return [
            //'products' => 'required',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.type' => 'required|exists:types,id',
            'products.*.quantity' => 'required|numeric|min:1',
        ];
    }
}
