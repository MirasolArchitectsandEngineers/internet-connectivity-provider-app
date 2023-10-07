<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $tickets = Ticket::with('router')->latest()->get();

        return view('livewire.ticket.index', compact('tickets'));
    }

    #[On('ticket-created')]
    public function ticketCreated($id)
    {
        $ticket = Ticket::find($id);

        $this->render();
    }

    public function pdf()
    {
        
    }
}
