<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class ArabicRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value): bool
    {
        if (preg_match("/\p{Arabic}/u", $value)) {
            return true;
        } else {
            return false;
        }
    }


    public function message()
    {
        return __('error.arabicRuleMessage');
    }
}
