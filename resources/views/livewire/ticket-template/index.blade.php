<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  @if ($ticketTemplates->count())
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Name
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
              Data Limit (MB)
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
              Blacklisted Sites
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              Whitelisted Sites
              <a href="#"><x-table-sort-icon /></a>
            </div>
          </th>
          <th scope="col"
            class="px-6 py-3 whitespace-nowrap">
            <span class="sr-only">Actions</span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ticketTemplates as $ticketTemplate)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $ticketTemplate->name }}
            </th>
            <td class="px-6 py-4">{{ $ticketTemplate->bandwidth }}</td>
            <td class="px-6 py-4">{{ $ticketTemplate->data_limit }}</td>
            <td class="px-6 py-4">{{ $ticketTemplate->duration }} {{ $ticketTemplate->duration_unit }}</td>
            <td class="px-6 py-4">{{ $ticketTemplate->sites_blacklist }}</td>
            <td class="px-6 py-4">{{ $ticketTemplate->sites_whitelist }}</td>
            <td class="px-6 py-4 text-right">
              <a href="#"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
              <a href="#"
                class="ml-2 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="px-6 py-4">No available router(s).</div>
  @endif
</div>
