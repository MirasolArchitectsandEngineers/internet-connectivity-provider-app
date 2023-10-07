<div>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-page-title>Create Router Configuration</x-page-title>
      <div>&nbsp;</div>
    </div>
  </x-slot>

  <x-container>
    <form wire:submit="store"
      novalidate class="grid grid-cols-3 gap-4">
      <div class="col-span-2">{{ $this->routerConfigForm }}</div>
      <x-dialog-footer class="col-span-2">
        <x-secondary-link-button href="{{ route('router-configs.index') }}"
          class="mr-2">Cancel</x-secondary-link-button>
        <x-button>Save</x-button>
      </x-dialog-footer>
    </form>
  </x-container>
</div>
