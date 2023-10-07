<?php

namespace App\Livewire\RouterConfigs;

use App\Models\RouterConfig;
use App\Traits\WithSorting;
use Livewire\Attributes\{Title, Url};
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;
    use WithSorting;

    #[Url]
    public $search;

    #[Title('Router Configurations')]
    public function render()
    {
        $routerConfigs = RouterConfig::when($this->search, function ($query, $value) {
            $query->where('name', 'like', "%{$value}%");
        })->sortQuery($this->sorting)
            ->when(! $this->sortColumn, function ($query) {
                $query->latest();
            })->paginate();

        return view('livewire.router-configs.index', compact('routerConfigs'));
    }

    public function updatedSearch($value)
    {
        $this->resetPage();

        $this->resetSort();
    }
}
