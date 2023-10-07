<form wire:submit="create">
  <div class="grid grid-cols-2 gap-6">
    <div class="col-span-1">
      <x-label for="name"
        value="Name" />
      <x-input id="name"
        type="text"
        wire:model="input.name"
        class="block w-full mt-1"
        autofocus />
      <x-input-error for="name"
        class="mt-2" />
    </div>
    <div class="col-span-1">
      <x-label for="data_limit"
        value="Data Limit (MB)" />
      <x-input id="data_limit"
        type="text"
        wire:model="input.data_limit"
        class="block w-full mt-1"
        autofocus />
      <x-input-error for="data_limit"
        class="mt-2" />
    </div>
    <div class="col-span-1">
      <x-label for="bandwidth"
        value="Bandwidth (Mbps) per User" />
      <x-input id="bandwidth"
        type="text"
        wire:model="input.bandwidth"
        class="block w-full mt-1" />
      <x-input-error for="bandwidth"
        class="mt-2" />
    </div>
    <div class="col-span-1">
      <x-label for="duration"
        value="Duration per User" />
      <div class="grid grid-cols-2 gap-2 mt-1">
        <x-input id="duration"
          type="text"
          wire:model="input.duration" />
        <x-select id="duration_unit"
          wire:model="input.duration_unit"
          :options="config('services.duration_units')"
          placeholder="-- Unit --" />
        <x-input-error for="duration"
          class="mt-2" />
      </div>
    </div>
    <div class="col-span-2">
      <x-label for="sites_blacklist"
        value="Blacklisted Sites (Enter domain names separated by new line)" />
      <x-textarea id="sites_blacklist"
        wire:model="input.sites_blacklist"
        class="block w-full mt-1"
        placeholder="eg: facebook.com" />
      <x-input-error for="sites_blacklist"
        class="mt-2" />
    </div>
    <div class="col-span-2">
      <x-label for="sites_whitelist"
        value="Whitelisted Sites (Enter domain names separated by new line)" />
      <x-textarea id="sites_whitelist"
        wire:model="input.sites_whitelist"
        class="block w-full mt-1"
        placeholder="eg: wikipedia.org" />
      <x-input-error for="sites_whitelist"
        class="mt-2" />
    </div>
    <div class="col-span-2">
      <x-label for="remarks"
        value="Remarks" />
      <x-textarea id="remarks"
        wire:model="input.remarks"
        class="block w-full mt-1" />
      <x-input-error for="remarks"
        class="mt-2" />
    </div>
  </div>
  <x-dialog-footer class="mt-4 -mx-6 -mb-4">
    <x-secondary-button wire:click="$set('showingForm', false)"
      class="mr-2">Cancel</x-secondary-button>
    <x-button>Save</x-button>
  </x-dialog-footer>
</form>
