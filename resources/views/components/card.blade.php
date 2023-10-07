<div class="w-full px-6 py-4 overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
  @isset($title)
    <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
      {{ $title }}
    </div>
  @endisset

  <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
    {{ $slot }}
  </div>
</div>
