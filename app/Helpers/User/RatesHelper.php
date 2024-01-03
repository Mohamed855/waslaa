<?php

namespace App\Helpers\User;

use App\Traits\QueriesTrait;

class RatesHelper
{
    use QueriesTrait;

    public function updateRateAvg ($type, $id): void
    {
        $averageRate = $this->rates()->where('type', $type)->where('rate_id', $id)->avg('rate');
        $selected = $type == 'product' ? $this->product() : $this->vendor();

        $selected->find($id)->update(['rate' => $averageRate ?? 0]);
    }
}
