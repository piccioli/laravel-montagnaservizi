@extends('layouts.admin')
@section('title', $category ? 'Modifica categoria' : 'Nuova categoria')

@section('content')
<form method="POST"
      action="{{ $category ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
      class="ms-admin-form">
    @csrf
    @if($category) @method('PUT') @endif

    <div class="ms-field">
        <label for="name">Nome <span style="color:#dc2626">*</span></label>
        <input type="text" id="name" name="name" value="{{ old('name', $category?->name) }}" required>
        @error('name')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field">
        <label for="slug">Slug <span style="color:#dc2626">*</span></label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $category?->slug) }}" required>
        <p class="ms-field__hint">Usato nell'URL: /news?categoria=<strong>slug</strong></p>
        @error('slug')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div style="display:flex;gap:1rem;margin-top:1.5rem;">
        <button type="submit" class="ms-btn ms-btn--primary">
            {{ $category ? 'Salva modifiche' : 'Crea categoria' }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="ms-btn ms-btn--outline">Annulla</a>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('name').addEventListener('input', function () {
    const slugField = document.getElementById('slug');
    if (!slugField.dataset.manual) {
        slugField.value = this.value.toLowerCase()
            .replace(/\s+/g, '-').replace(/[^a-z0-9\-]/g, '').replace(/-+/g, '-');
    }
});
document.getElementById('slug').addEventListener('input', function () {
    this.dataset.manual = '1';
});
</script>
@endpush

@endsection
