@props(['options' => [], 'option-value', 'option-text', 'option-data', 'error-name', 'error-class', 'error-bag', 'disabled' => false, 'noPlaceholder' => false])

<select
  {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm ' . ($errors->{$errorBag ?? 'default'}->has($errorName ?? $attributes['name']) ? $errorClass ?? 'is-invalid' : null)]) }}
  {{ $disabled ? 'disabled' : null }}>
  @if (!$noPlaceholder)
    <option value=""
      @selected(($attributes['value'] ?? '') == '')>
      {{ $attributes->has('placeholder') ? $attributes['placeholder'] : '-- Please Select --' }}
    </option>
  @endif

  @if ($options instanceof \Illuminate\Support\Collection)
    @foreach ($options as $option)
      <option value="{{ $option[$optionValue] }}"
        @selected($attributes['value'] == $option[$optionValue])
        @foreach ($optionData ?? [] as $columnName) data-{{ $columnName }}="{{ is_array($option[$columnName]) ? json_encode($option[$columnName]) : $option[$columnName] }}" @endforeach>
        {{ $option[$optionText] }}
      </option>
    @endforeach
  @elseif (Arr::isList($options))
    @foreach ($options as $option)
      <option value="{{ $option }}"
        @selected(($attributes['value'] ?? null) == $option)>
        {{ $option }}
      </option>
    @endforeach
  @else
    @foreach ($options as $value => $text)
      <option value="{{ $value }}"
        @selected(($attributes['value'] ?? null) == $value)>
        {{ $text }}
      </option>
    @endforeach
  @endif
</select>
