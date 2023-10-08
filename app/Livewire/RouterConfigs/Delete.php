<?php

namespace App\Livewire\RouterConfigs;

use App\Models\RouterConfig;
use Livewire\Attributes\{Computed, On};
use Livewire\Component;

class Delete extends Component
{
    public $id;

    public $confirming = false;

    #[Computed]
    public function routerConfig()
    {
        return RouterConfig::find($this->id);
    }

    public function render()
    {
        return view('livewire.router-configs.delete');
    }

    #[On('delete-router-config')]
    public function delete($id)
    {
        $this->id = $id;

        $this->confirming = true;
    }

    public function destroy()
    {
        $this->routerConfig->delete();

        $this->confirming = false;

        $this->dispatch('router-config-deleted');
    }
}
