<?php

namespace App\Livewire\DeviceUserGroups;

use App\Models\DeviceUserGroup;
use App\Traits\Forms\{WithDeviceUserGroupForm, WithRouterConfigForm};
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRouterConfigForm;
    use WithDeviceUserGroupForm;

    public $deviceUserGroupInput = [];

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

    public function mount()
    {
        $this->routerConfigUsage = true;
    }

    public function render()
    {
        return view('livewire.device-user-groups.create');
    }

    public function store()
    {
        $data = array_merge(
            $this->routerConfigForm->getState(),
            $this->deviceUserGroupForm->getState(),
        );

        $deviceUserGroup = DeviceUserGroup::create($data);

        return redirect(route('device-groups.index', $deviceUserGroup));
    }

    protected function getForms()
    {
        return [
            'routerConfigForm',
            'deviceUserGroupForm',
        ];
    }
}
