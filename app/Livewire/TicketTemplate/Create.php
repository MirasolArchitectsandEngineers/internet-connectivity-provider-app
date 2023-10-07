<?php

namespace App\Livewire\TicketTemplate;

use App\Actions\TicketTemplate\CreateTicketTemplate;
use App\Traits\HasDialogForm;
use Livewire\Component;

class Create extends Component
{
    use HasDialogForm;

    public $input = [];

    public $title = 'Create Ticket Template';

    public function render()
    {
        return view('livewire.ticket-template.create');
    }

    public function create(CreateTicketTemplate $action)
    {
        $action->create($this->input);

        $this->showingForm = false;

        $this->dispatch('ticket-template-created');
    }
}
