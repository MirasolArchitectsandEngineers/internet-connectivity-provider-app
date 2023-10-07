<?php

namespace App\Livewire\TicketTemplate;

use App\Models\TicketTemplate;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('ticket-template-created')]
    public function render()
    {
        $ticketTemplates = TicketTemplate::latest()->get();

        return view('livewire.ticket-template.index', compact('ticketTemplates'));
    }
}
