<?php

namespace App\Livewire\Routers;

use App\Actions\Router\UpdateRouter;
use App\Traits\Forms\WithRouterForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Attributes\{Computed, On};
use Livewire\Component;

class Update extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRouterForm;

    public function render()
    {
        return view('livewire.routers.update');
    }

    #[On('edit-router')]
    public function edit($id)
    {
        $this->resetValidation();

        $this->routerId = $id;

        $this->routerForm->fill($this->router->only([
            'name',
            'model',
            'host',
            'username',
            'password',
            'remarks',
        ]));

        $this->showingForm = true;
    }

    public function update(UpdateRouter $action)
    {
        $action->update($this->routerForm->getState(), $this->router);

        $this->showingForm = false;

        $this->dispatch('router-updated');
    }

    protected function getForms()
    {
        return [
            'routerForm',
        ];
    }
}
