<?php

namespace App\Traits;

use Livewire\Attributes\{Computed, Url};

trait WithSorting
{
    #[Url(as: 'sort-by')]
    public $sortColumn;

    #[Url(as: 'sort-order')]
    public $sortDirection;

    #[Computed]
    public function sorting()
    {
        return [
            'column' => $this->sortColumn,
            'direction' => $this->sortDirection,
        ];
    }

    public function sort($sortColumn, $sortDirection)
    {
        $this->sortColumn = $sortColumn;

        $this->sortDirection = $sortDirection;

        $this->render();
    }

    public function resetSort()
    {
        $this->sortColumn = '';

        $this->sortDirection = '';
    }
}
