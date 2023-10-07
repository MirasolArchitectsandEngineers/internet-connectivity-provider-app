<div>
  <x-confirmation-modal id="deleteRouterModal"
    wire:model.live="confirming">
    <x-slot name="title">Delete Router</x-slot>
    <x-slot name="content">Are you sure you want to delete this router?</x-slot>
    <x-slot name="footer">
      <x-secondary-button wire:click="$set('confirming', false)"
        class="mr-2">No</x-secondary-button>
      <x-button type="button"
        wire:click="destroy">Yes</x-button>
    </x-slot>
  </x-confirmation-modal>
</div>
