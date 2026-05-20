@extends('layouts.admin')
@section('title', $article ? 'Modifica articolo' : 'Nuovo articolo')

@section('content')
<form method="POST"
      action="{{ $article ? route('admin.news.update', $article) : route('admin.news.store') }}"
      enctype="multipart/form-data"
      class="ms-admin-form-wide">
    @csrf
    @if($article) @method('PUT') @endif

    <div class="ms-field-row">
        <div class="ms-field">
            <label for="title">Titolo <span style="color:#dc2626">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $article?->title) }}" required>
            @error('title')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="ms-field">
            <label for="slug">Slug <span style="color:#dc2626">*</span></label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $article?->slug) }}" required>
            @error('slug')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="ms-field-row">
        <div class="ms-field">
            <label for="news_category_id">Categoria</label>
            <select id="news_category_id" name="news_category_id">
                <option value="">— Nessuna —</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ old('news_category_id', $article?->news_category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="ms-field">
            <label for="published_at">Data di pubblicazione</label>
            <input type="datetime-local" id="published_at" name="published_at"
                   value="{{ old('published_at', $article?->published_at?->format('Y-m-d\TH:i')) }}">
            <p class="ms-field__hint">Lascia vuoto per salvare come bozza.</p>
        </div>
    </div>

    <div class="ms-field">
        <label for="excerpt">Excerpt</label>
        <textarea id="excerpt" name="excerpt" style="min-height:80px;">{{ old('excerpt', $article?->excerpt) }}</textarea>
        <p class="ms-field__hint">Breve riassunto (max 500 caratteri). Usato nei meta e nelle card.</p>
        @error('excerpt')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field">
        <label for="body">Corpo dell'articolo <span style="color:#dc2626">*</span></label>
        <textarea id="body" name="body" style="min-height:360px;font-family:monospace;font-size:.875rem;">{{ old('body', $article?->body) }}</textarea>
        <p class="ms-field__hint">HTML ammesso: &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;strong&gt;, &lt;a&gt;, ecc.</p>
        @error('body')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field">
        <label for="cover_image">Immagine di copertina</label>
        @if($article?->cover_image)
            <p style="margin-bottom:.5rem;">
                <img src="{{ Storage::url($article->cover_image) }}" alt="" style="height:80px;border-radius:6px;object-fit:cover;">
                <span style="font-size:.8125rem;color:var(--ms-muted);margin-left:.5rem;">Immagine attuale</span>
            </p>
        @endif
        <input type="file" id="cover_image" name="cover_image" accept="image/*">
        <p class="ms-field__hint">JPEG/PNG/WebP, max 4 MB. Lascia vuoto per mantenere quella attuale.</p>
        @error('cover_image')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div style="display:flex;gap:1rem;margin-top:1.5rem;">
        <button type="submit" class="ms-btn ms-btn--primary">
            {{ $article ? 'Salva modifiche' : 'Crea articolo' }}
        </button>
        <a href="{{ route('admin.news.index') }}" class="ms-btn ms-btn--outline">Annulla</a>
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
