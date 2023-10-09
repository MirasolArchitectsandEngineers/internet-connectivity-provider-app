<?php

namespace App\Traits\Forms;

use App\Models\{DeviceUserGroup, RouterConfig};
use Filament\Forms\Components\{Section, Select, TextInput};
use Filament\Forms\Form;
use Livewire\Attributes\Computed;

trait WithDeviceUserGroupForm
{
    public $deviceUserGroupId;

    #[Computed]
    public function deviceUserGroup()
    {
        return DeviceUserGroup::find($this->deviceUserGroupId);
    }

    public function deviceUserGroupForm(Form $form)
    {
        return $form->schema([
            Section::make()->schema([
                TextInput::make('name')
                    ->validationAttribute('name')
                    ->required()
                    ->string()
                    ->unique(DeviceUserGroup::class, 'name', fn () => $this->deviceUserGroup)
                    ->rules(['max:255'])
                    ->columnSpan(2)
                    ->autofocus(),
                Select::make('router_id')
                    ->validationAttribute('router')
                    ->options(RouterConfig::all()->pluck('name', 'id'))
                    ->searchable(['name'])
                    ->preload()
                    ->columnSpan(2),
            ])
                ->columnSpan(2)
                ->columns(2),
        ])->statePath('deviceUserGroupInput');
    }
}
