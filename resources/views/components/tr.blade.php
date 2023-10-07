@props(['odd' => true])

<tr {{ $attributes->merge(['class' => $odd ? 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600' : 'border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700']) }}>
  {{ $slot }}</tr>
