<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-page-title>Ticket Templates</x-page-title>

      @livewire('ticket-template.create')
    </div>
  </x-slot>

  <x-container>
    @livewire('ticket-template.index')
  </x-container>
</x-app-layout>
