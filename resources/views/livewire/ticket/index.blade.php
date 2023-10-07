<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  @if ($tickets->count())
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">&nbsp;</th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Date Generated
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Router
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Number of Users
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Bandwidth (Mbps)
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Duration
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Data Consumed (MB)
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Connected
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
        @foreach ($tickets as $ticket)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4 whitespace-nowrap">
              <a href="{{ route('ticket.show', $ticket) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
            </td>
            <th scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $ticket->created_at->diffForHumans() }}
            </th>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->router->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->count }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->bandwidth }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->duration }} {{ $ticket->duration_unit }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($ticket->data_consumed, 2) }} / {{ number_format($ticket->data_limit, 2) }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->connected }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->exerted }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->usage_average }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="px-6 py-4">No available router(s).</div>
  @endif
</div>
