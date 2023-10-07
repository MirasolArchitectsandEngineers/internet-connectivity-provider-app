@props(['column'])

@php
  $sortDirection = ['ascending' => 'ascending', 'descending' => 'descending'][strtolower($this->sorting['direction'])] ?? 'asc';
  
  $sortIcons = [
      'ascending' => 'fas-sort-up',
      'descending' => 'fas-sort-down',
  ];
  
  $sortIcon = $this->sorting['column'] == $column ? $sortIcons[$sortDirection] ?? 'fas-sort' : 'fas-sort';
  
  $direction = $column == $this->sorting['column'] && $sortDirection == 'ascending' ? 'descending' : 'ascending';
@endphp

<button type="button"
  class="flex items-baseline uppercase"
  wire:click="sort('{{ $column }}', '{{ $direction }}')">
  {{ $slot }}
  <x-icon name="{{ $sortIcon }}"
    class="h-3 w-3 ml-1.5"></x-icon>
</button>
