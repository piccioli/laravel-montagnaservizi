@extends('layouts.admin')
@section('title', $service ? 'Modifica servizio' : 'Nuovo servizio')

@section('content')
<form method="POST"
      action="{{ $service ? route('admin.services.update', $service->id) : route('admin.services.store') }}"
      class="ms-admin-form-wide">
    @csrf
    @if($service) @method('PUT') @endif

    <div class="ms-field-row">
        <div class="ms-field">
            <label for="title">Titolo <span style="color:#dc2626">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $service?->title) }}" required>
            @error('title')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="ms-field">
            <label for="slug">Slug <span style="color:#dc2626">*</span></label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $service?->slug) }}" required>
            @error('slug')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="ms-field-row">
        <div class="ms-field">
            <label for="category_slug">Categoria <span style="color:#dc2626">*</span></label>
            <select id="category_slug" name="category_slug" required>
                @foreach($categories as $slug => $label)
                    <option value="{{ $slug }}"
                        {{ old('category_slug', $service?->category_slug) === $slug ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('category_slug')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="ms-field">
            <label for="sort_order">Ordine</label>
            <input type="number" id="sort_order" name="sort_order" min="0"
                   value="{{ old('sort_order', $service?->sort_order ?? 0) }}">
        </div>
    </div>

    <div class="ms-field">
        <label for="subtitle">Sottotitolo / badge</label>
        <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $service?->subtitle) }}">
        <p class="ms-field__hint">Piccolo badge sopra il titolo nella pagina di dettaglio.</p>
    </div>

    <div class="ms-field">
        <label for="description">Descrizione breve <span style="color:#dc2626">*</span></label>
        <textarea id="description" name="description" style="min-height:80px;" required>{{ old('description', $service?->description) }}</textarea>
        <p class="ms-field__hint">Usata nelle card e come meta description (max 500 caratteri).</p>
        @error('description')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field">
        <label for="body">Corpo esteso</label>
        <textarea id="body" name="body" style="min-height:320px;font-family:monospace;font-size:.875rem;">{{ old('body', $service?->body) }}</textarea>
        <p class="ms-field__hint">HTML ammesso. Lascia vuoto per mostrare solo la descrizione breve.</p>
    </div>

    <div style="display:flex;gap:1rem;margin-top:1.5rem;">
        <button type="submit" class="ms-btn ms-btn--primary">
            {{ $service ? 'Salva modifiche' : 'Crea servizio' }}
        </button>
        <a href="{{ route('admin.services.index') }}" class="ms-btn ms-btn--outline">Annulla</a>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('title').addEventListener('input', function () {
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
