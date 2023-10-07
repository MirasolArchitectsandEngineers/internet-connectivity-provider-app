<?php

namespace App\Traits;

use App\Models\TicketDevice;
use Illuminate\Support\Str;

trait TicketDeviceCodeGenerator
{
    public function generateTicketDeviceCode()
    {
        do {
            $code = Str::upper(fake()->bothify('????####'));
        } while (TicketDevice::where('code', $code)->first());

        return $code;
    }
}
