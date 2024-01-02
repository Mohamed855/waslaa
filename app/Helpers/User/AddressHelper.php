<?php

namespace App\Helpers\User;

use App\Http\Resources\User\AddressesRecourse;
use App\Traits\QueriesTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AddressHelper
{
    use QueriesTrait;

    public function getAddresses (): AnonymousResourceCollection
    {
        $myAddress = $this->address()->with('_city')->where('type', 'user')
            ->where('user_id', auth()->id())->get();

        return AddressesRecourse::collection($myAddress);
    }
}
