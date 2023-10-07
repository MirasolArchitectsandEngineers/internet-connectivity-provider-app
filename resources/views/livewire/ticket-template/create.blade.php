<div>
  <x-button type="button"
    wire:click="showForm">Create</x-button>
  <x-dialog-modal wire:model.live="showingForm">
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="content">
      @include('ticket-template.form')
    </x-slot>
  </x-dialog-modal>
</div>
