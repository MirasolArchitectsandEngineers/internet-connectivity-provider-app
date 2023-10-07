@props(['model'])

@if ($model->hasPages())
  <nav class="px-6 py-4 bg-white">{{ $model->links() }}</nav>
@endif
