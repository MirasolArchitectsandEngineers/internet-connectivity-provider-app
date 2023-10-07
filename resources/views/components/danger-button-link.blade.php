<button type="button"
  {{ $attributes->merge(['class' => 'font-medium text-red-600 hover:text-red-500 h-100 w-100 dark:text-red-500 dark:hover:text-red-400 hover:underline']) }}>
  {{ $slot }}
</button>
