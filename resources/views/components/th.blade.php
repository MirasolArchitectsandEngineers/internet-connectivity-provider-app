<th scope="col"
  {{ $attributes->merge(['class' => 'px-6 py-3']) }}>
  @if ($attributes->has('sort-column'))
    <x-sort-column :column="$attributes->get('sort-column')">{{ $slot }}</x-sort-column>
  @else
    {{ $slot }}
  @endif
</th>
