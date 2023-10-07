<div class="mt-8">
  <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
    Users
  </div>

  <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
    @if ($ticket->devices()->count())
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col"
              class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                Code
                <a href="#"><x-table-sort-icon /></a>
              </div>
            </th>
            <th scope="col"
              class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                Password
                <a href="#"><x-table-sort-icon /></a>
              </div>
            </th>
            <th scope="col"
              class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                Duration Consumed
                <a href="#"><x-table-sort-icon /></a>
              </div>
            </th>
            <th scope="col"
              class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                Currently Connected
                <a href="#"><x-table-sort-icon /></a>
              </div>
            </th>
            <th scope="col"
              class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                Exerted
                <a href="#"><x-table-sort-icon /></a>
              </div>
            </th>
            <th scope="col"
              class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                Average Data Usage (per Hour)
                <a href="#"><x-table-sort-icon /></a>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ticket->devices()->latest()->get() as $device)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $device->code }}
              </th>
              <td class="px-6 py-4 whitespace-nowrap">{{ $device->password }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $device->duration_consumed }}</td>
              <td class="px-6 py-4 text-center whitespace-nowrap">
                @if ($device->connected)
                  <x-checkbox checked
                    readonly
                    x-on:click="event.peventDefault()" />
                @else
                  <x-checkbox readonly
                    x-on:click="event.preventDefault()" />
                @endif
              </td>
              <td class="px-6 py-4 text-center whitespace-nowrap">
                @if ($device->exerted)
                  <x-checkbox checked
                    readonly
                    x-on:click="event.peventDefault()" />
                @else
                  <x-checkbox readonly
                    x-on:click="event.preventDefault()" />
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $device->usage_average }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="px-6 py-4">No available router(s).</div>
    @endif
  </div>

</div>
