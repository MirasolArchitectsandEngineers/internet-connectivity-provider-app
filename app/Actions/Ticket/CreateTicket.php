<?php

namespace App\Actions\Ticket;

use App\Models\{Router, Ticket};
use App\Traits\TicketDeviceCodeGenerator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateTicket
{
    use TicketDeviceCodeGenerator;

    public function create($input)
    {
        $data = Validator::make($input, [
            'router_id' => ['required', Rule::exists(Router::class, 'id')],
            'count' => ['required', 'integer', 'min:1', 'max:999999'],
            'bandwidth' => ['required', 'numeric', 'min:0.01', 'max:999999'],
            'data_limit' => ['required', 'numeric', 'min:0.01', 'max:999999'],
            'duration' => ['required', 'numeric', 'min:0.01', 'max:999999'],
            'duration_unit' => ['required', 'in:' . implode(',', array_keys(config('services.duration_units')))],
            'sites_blacklist' => ['nullable', 'string'],
            'sites_whitelist' => ['nullable', 'string'],
        ], [], [
            'router_id' => 'Router',
            'count' => 'Number of Users',
            'bandwidth' => 'Bandwidth',
            'duration' => 'Duration',
            'duration_unit' => 'Unit',
            'sites_blacklist' => 'Blacklisted Sites',
            'sites_whitelist' => 'Whitelisted Listes',
        ])->validate();

        $ticket = Ticket::create($data);

        for ($i = 1; $i <= $ticket->count; ++$i) {
            $ticket->devices()->create([
                'code' => $this->generateTicketDeviceCode(),
                'password' => fake()->lexify('??????'),
            ]);
        }

        return $ticket;
    }
}
