<div>
  <x-button type="button"
    wire:click="create">Create</x-button>
  <x-dialog-modal id="createRouterModal"
    wire:model.live="showingForm">
    <x-slot name="title">Create Router</x-slot>
    <x-slot name="content">
      <form wire:submit="store"
        novalidate>
        @include('livewire.routers.form')
      </form>
    </x-slot>
  </x-dialog-modal>
</div>
