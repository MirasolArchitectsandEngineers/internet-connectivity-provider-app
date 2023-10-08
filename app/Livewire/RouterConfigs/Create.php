<?php

namespace App\Livewire\RouterConfigs;

use App\Models\RouterConfig;
use App\Traits\Forms\WithRouterConfigForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRouterConfigForm;

    public $input = [
        'data_limit' => [
            [
                'value' => null,
                'unit' => null,
                'from' => null,
                'to' => null,
                'options' => null,
            ],
        ],
        'download_speed_limit' => [
            [
                'value' => null,
                'unit' => null,
                'from' => null,
                'to' => null,
                'options' => null,
            ],
        ],
        'upload_speed_limit' => [
            [
                'value' => null,
                'unit' => null,
                'from' => null,
                'to' => null,
                'options' => null,
            ],
        ],
        'disable_access' => [
            [
                'value' => null,
                'unit' => null,
                'from' => null,
                'to' => null,
                'options' => null,
            ],
        ],
        'sites_allowed' => [],
        'sites_denied' => [],
    ];

    public function render()
    {
        return view('livewire.router-configs.create');
    }

    public function store()
    {
        RouterConfig::create($this->routerConfigForm->getState());

        return redirect(route('router-configs.index'));
    }

    protected function getForms()
    {
        return [
            'routerConfigForm',
        ];
    }
}
