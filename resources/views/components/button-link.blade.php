<button type="button"
  {{ $attributes->merge(['class' => 'font-medium text-indigo-600 hover:text-indigo-500 h-100 w-100 dark:text-indigo-500 dark:hover:text-indigo-400 hover:underline']) }}>
  {{ $slot }}
</button>
