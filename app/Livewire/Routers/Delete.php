<?php

namespace App\Livewire\Routers;

use App\Models\Router;
use Livewire\Attributes\{Computed, On};
use Livewire\Component;

class Delete extends Component
{
    public $id;

    public $confirming = false;

    #[Computed]
    public function router()
    {
        return Router::find($this->id);
    }

    public function render()
    {
        return view('livewire.routers.delete');
    }

    #[On('delete-router')]
    public function delete($id)
    {
        $this->id = $id;

        $this->confirming = true;
    }

    public function destroy()
    {
        $this->router->delete();

        $this->confirming = false;

        $this->dispatch('router-deleted');
    }
}
