<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-page-title>Tickets</x-page-title>

      @livewire('ticket.create')
    </div>
  </x-slot>

  <x-container>
    @livewire('ticket.index')
  </x-container>
</x-app-layout>
