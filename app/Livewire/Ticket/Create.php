<?php

namespace App\Livewire\Ticket;

use App\Actions\Ticket\CreateTicket;
use App\Models\{Router, TicketTemplate};
use App\Traits\HasDialogForm;
use Livewire\Component;

class Create extends Component
{
    use HasDialogForm;

    public $input = [];

    public $title = 'Generate Ticket';

    public function render()
    {
        $routers = Router::oldest('name')->get();

        $ticketTemplates = TicketTemplate::oldest('name')->get();

        return view('livewire.ticket.create', compact('routers', 'ticketTemplates'));
    }

    public function updated($name, $value)
    {
        if ('input.ticket_template_id' == $name && $value) {
            $ticketTemplate = TicketTemplate::find($value);

            $this->input = array_merge($this->input, $ticketTemplate->only([
                'bandwidth',
                'duration',
                'duration_unit',
                'sites_blacklist',
                'sites_whitelist',
            ]));
        }
    }

    public function create(CreateTicket $action)
    {
        $ticket = $action->create($this->input);

        $this->showingForm = false;

        $this->dispatch('ticket-created', $ticket->id);
    }
}
