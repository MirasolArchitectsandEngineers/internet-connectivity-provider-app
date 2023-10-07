<div>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-page-title>Routers</x-page-title>

      @livewire('routers.create')
    </div>
  </x-slot>

  <x-container>
    <div class="mb-4">
      <x-input id="search"
        wire:model.live.debounce.500ms="search"
        placeholder="Search..."
        autofocus />
    </div>
    <x-table-wrapper>
      @if ($routers->count())
        <x-table>
          <x-thead>
            <tr>
              <x-th><span class="sr-only">Actions</span></x-th>
              <x-th sort-column="name">Name</x-th>
              <x-th sort-column="model">Model</x-th>
              <x-th sort-column="host">Host</x-th>
              <x-th sort-column="username">Username</x-th>
              <x-th>Password</x-th>
            </tr>
          </x-thead>
          <tbody>
            @foreach ($routers as $router)
              <x-tr wire:key="{{ $router->id }}">
                <x-td class="flex items-center -m-2">
                  <x-button-link class="flex items-center p-2"
                    title="View / Edit"
                    wire:click="$dispatch('edit-router', { id: {{ $router->id }}})">
                    <x-icon name="fas-eye"
                      class="w-4 h-4" />
                  </x-button-link>
                  <x-danger-button-link class="flex items-center p-2"
                    title="Delete"
                    wire:click="$dispatch('delete-router', { id: {{ $router->id }} })">
                    <x-icon name="fas-trash"
                      class="w-4 h-4" />
                  </x-danger-button-link>
                </x-td>
                <x-td-main>
                  {{ $router->name }}
                </x-td-main>
                <x-td>{{ $router->model }}</x-td>
                <x-td>{{ $router->host }}</x-td>
                <x-td>{{ $router->username }}</x-td>
                <x-td>{{ $router->password }}</x-td>
              </x-tr>
            @endforeach
          </tbody>
        </x-table>

        <x-paginator :model="$routers" />
      @else
        <div class="px-6 py-4">No available router(s).</div>
      @endif
    </x-table-wrapper>
  </x-container>

  @livewire('routers.update')

  @livewire('routers.delete')
</div>
