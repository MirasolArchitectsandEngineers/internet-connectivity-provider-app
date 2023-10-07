<?php

namespace App\Actions\TicketTemplate;

use App\Models\TicketTemplate;
use Illuminate\Support\Facades\Validator;

class CreateTicketTemplate
{
    public function create($input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'bandwidth' => ['required', 'numeric', 'min:0.01', 'max:999999'],
            'data_limit' => ['required', 'numeric', 'min:0.01', 'max:999999'],
            'duration' => ['required', 'numeric', 'min:0.01', 'max:999999'],
            'duration_unit' => ['required', 'in:' . implode(',', array_keys(config('services.duration_units')))],
            'sites_blacklist' => ['nullable', 'string'],
            'sites_whitelist' => ['nullable', 'string'],
            'remarks' => ['nullable', 'string'],
        ], [], [
            'name' => 'Name',
            'bandwidth' => 'Bandwidth',
            'data_limit' => 'Data Limit',
            'duration' => 'Duration',
            'duration_unit' => 'Unit',
            'sites_blacklist' => 'Blacklisted Sites',
            'sites_whitelist' => 'Whitelisted Sites',
            'remarks' => 'Remarks',
        ])->validate();

        return TicketTemplate::create($input);
    }
}
