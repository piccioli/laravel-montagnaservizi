@extends('layouts.admin')
@section('title', 'Categorie news')

@section('actions')
    <a href="{{ route('admin.categories.create') }}" class="ms-btn ms-btn--primary ms-btn--sm">+ Nuova categoria</a>
@endsection

@section('content')
<div class="ms-admin-card">
    <table class="ms-admin-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
                <th>Articoli</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td><strong>{{ $category->name }}</strong></td>
                <td><code style="font-size:.8125rem;">{{ $category->slug }}</code></td>
                <td>{{ $category->news_count }}</td>
                <td>
                    <div class="ms-admin-actions">
                        <a href="{{ route('admin.categories.edit', $category) }}">Modifica</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                              onsubmit="return confirm('Eliminare questa categoria?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;color:var(--ms-muted);">Nessuna categoria.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
