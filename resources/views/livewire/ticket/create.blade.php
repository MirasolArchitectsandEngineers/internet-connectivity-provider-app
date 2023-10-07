<div>
  <x-button type="button"
    wire:click="showForm">Generate</x-button>
  <x-dialog-modal wire:model.live="showingForm">
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="content">
      @include('ticket.form')
    </x-slot>
  </x-dialog-modal>
</div>
