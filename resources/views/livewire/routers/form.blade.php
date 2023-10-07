{{ $this->routerForm }}
<x-dialog-footer class="mt-4 -mx-6 -mb-4">
  <x-secondary-button wire:click="$set('showingForm', false)"
    class="mr-2">Cancel</x-secondary-button>
  <x-button>Save</x-button>
</x-dialog-footer>
