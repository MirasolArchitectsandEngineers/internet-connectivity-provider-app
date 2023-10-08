<?php

namespace App\Livewire\RouterConfigs;

use App\Traits\Forms\WithRouterConfigForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Update extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRouterConfigForm;

    public $input = [];

    public function mount($routerConfig)
    {
        $this->routerConfigId = $routerConfig;

        $this->routerConfigForm->fill(collect($this->routerConfig)->except([
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ])->all());
    }

    public function render()
    {
        return view('livewire.router-configs.update');
    }

    public function update()
    {
        $this->routerConfig->update($this->routerConfigForm->getState());

        return redirect(route('router-configs.index'));
    }

    protected function getForms()
    {
        return [
            'routerConfigForm',
        ];
    }
}
