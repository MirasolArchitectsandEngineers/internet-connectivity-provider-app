<div>
  <x-dialog-modal id="editRouterModal"
    wire:model.live="showingForm">
    <x-slot name="title">Router Details</x-slot>
    <x-slot name="content">
      <form wire:submit="update"
        novalidate>
        @include('livewire.routers.form')
      </form>
    </x-slot>
  </x-dialog-modal>
</div>
