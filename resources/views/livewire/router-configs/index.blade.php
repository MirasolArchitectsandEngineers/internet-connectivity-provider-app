<div>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-page-title>Router Configurations</x-page-title>

      <x-link-button href="{{ route('router-configs.create') }}">Create</x-link-button>
    </div>
  </x-slot>

  <x-container>
    <div class="mb-4">
      <div class="mb-4">
        <x-input id="search"
          wire:model.live.debounce.500ms="search"
          placeholder="Search..."
          autofocus />
      </div>
    </div>
    <x-table-wrapper>
      @if ($routerConfigs->count())
        <x-table>
          <x-thead>
            <tr>
              <x-th><span class="sr-only">Actions</span></x-th>
              <x-th sort-column="name">Name</x-th>
            </tr>
          </x-thead>
          <tbody>
            @foreach ($routerConfigs as $routerConfig)
              <x-tr wire:key="{{ $routerConfig->id }}">
                <x-td class="flex items-center -m-2">
                  <x-link href="{{ route('router-configs.update', $routerConfig) }}"
                    class="flex items-center p-2"
                    title="View / Edit">
                    <x-icon name="fas-eye"
                      class="w-4 h-4" />
                  </x-link>
                  <x-danger-button-link class="flex items-center p-2"
                    title="Delete"
                    wire:click="$dispatch('delete-router-config', { id: {{ $routerConfig->id }} })">
                    <x-icon name="fas-trash"
                      class="w-4 h-4" />
                  </x-danger-button-link>
                </x-td>
                <x-td>{{ $routerConfig->name }}</x-td>
              </x-tr>
            @endforeach
          </tbody>
        </x-table>
      @else
        <div class="px-6 py-4">No available router configuration(s).</div>
      @endif
    </x-table-wrapper>
  </x-container>

  @livewire('router-configs.delete')
</div>
