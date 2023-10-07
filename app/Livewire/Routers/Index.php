<?php

namespace App\Livewire\Routers;

use App\Models\Router;
use App\Traits\WithSorting;
use Livewire\Attributes\{On, Title, Url};
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;
    use WithSorting;

    #[Url]
    public $search;

    #[Title('Routers')]
    #[On('router-created')]
    #[On('router-updated')]
    #[On('router-deleted')]
    public function render()
    {
        $routers = Router::when($this->search, function ($query, $value) {
            $query->where('name', 'like', "%{$value}%")
                ->orWhere('model', 'like', "%{$value}%")
                ->orWhere('host', 'like', "%{$value}%")
                ->orWhere('username', 'like', "%{$value}%")
                ->orWhere('password', 'like', "%{$value}%");
        })->sortQuery($this->sorting)
            ->when(! $this->sortColumn, function ($query) {
                $query->latest();
            })->paginate(10);

        return view('livewire.routers.index', compact('routers'));
    }

    public function updatedSearch($value)
    {
        $this->resetPage();

        $this->resetSort();
    }
}
