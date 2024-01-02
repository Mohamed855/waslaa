<?php

namespace App\Helpers\User;

use App\Traits\QueriesTrait;

class ProfileHelper
{
    use QueriesTrait;

    public function updateCurrUserDetails (array $request): void
    {
        $this->user()->find(auth()->id())->update($request);
    }
}
