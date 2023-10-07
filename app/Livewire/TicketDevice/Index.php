<?php

namespace App\Livewire\TicketDevice;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public Ticket $ticket;

    public function render()
    {
        return view('livewire.ticket-device.index');
    }
}
