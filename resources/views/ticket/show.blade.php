<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-page-title>Ticket Details</x-page-title>
      <div>
        <x-breadcrumb-link href="{{ route('ticket.index') }}">Tickets</x-breadcrumb-link>
      </div>
    </div>
  </x-slot>

  <x-container>
    <x-card>
      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-2">
          <div class="font-medium">{{ $ticket->created_at->format('m/d/Y h:i A') }}</div>
          <div class="text-gray-500 dark:text-gray-400">Date Generated</div>
        </div>
        <div class="col-span-2">
          <div class="font-medium">{{ $ticket->router->name }}</div>
          <div class="text-gray-500 dark:text-gray-400">Router</div>
        </div>
        <div class="col-span-2">
          <div class="font-medium">{{ $ticket->count }}</div>
          <div class="text-gray-500 dark:text-gray-400">Number of Users</div>
        </div>
        <div class="col-span-2">
          <div class="font-medium">{{ number_format($ticket->data_consumed, 2) }} / {{ number_format($ticket->data_limit, 2) }}</div>
          <div class="text-gray-500 dark:text-gray-400">Data Consumed (MB)</div>
        </div>
        <div class="col-span-2">
          <div class="font-medium">{{ $ticket->bandwidth }}</div>
          <div class="text-gray-500 dark:text-gray-400">Bandwidth (Mbps) per User</div>
        </div>
        <div class="col-span-2">
          <div class="font-medium">{{ $ticket->duration }}</div>
          <div class="text-gray-500 dark:text-gray-400">Duration per User</div>
          <div class="grid grid-cols-2 gap-2 mt-1">
          </div>
        </div>
        <div class="col-span-3">
          <div class="font-medium">{{ $ticket->sites_blacklist }}</div>
          <div class="text-gray-500 dark:text-gray-400">Blacklisted Sites</div>
        </div>
        <div class="col-span-3">
          <div class="font-medium">{{ $ticket->sites_whitelist }}</div>
          <div class="text-gray-500 dark:text-gray-400">Whitelisted Sites</div>
        </div>
        <div class="col-span-6">
          <div class="font-medium">{{ $ticket->remarks ?: '-' }}</div>
          <div class="text-gray-500 dark:text-gray-400">Remarks</div>
        </div>
      </div>
    </x-card>

    @livewire('ticket-device.index', ['ticket' => $ticket])
  </x-container>
</x-app-layout>
