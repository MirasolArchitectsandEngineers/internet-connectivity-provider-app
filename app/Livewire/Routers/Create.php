<?php

namespace App\Livewire\Routers;

use App\Actions\Router\CreateRouter;
use App\Traits\Forms\WithRouterForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRouterForm;

    public function render()
    {
        return view('livewire.routers.create');
    }

    public function create()
    {
        $this->resetValidation();

        $this->routerForm->fill([]);

        $this->showingForm = true;
    }

    public function store(CreateRouter $action)
    {
        $action->create($this->routerForm->getState());

        $this->showingForm = false;

        $this->dispatch('router-created');
    }

    protected function getForms()
    {
        return [
            'routerForm',
        ];
    }
}
