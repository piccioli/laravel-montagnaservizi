@extends('layouts.admin')
@section('title', 'News')

@section('actions')
    <a href="{{ route('admin.news.create') }}" class="ms-btn ms-btn--primary ms-btn--sm">+ Nuovo articolo</a>
@endsection

@section('content')
<div class="ms-admin-card">
    <table class="ms-admin-table">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Stato</th>
                <th>Pubblicato il</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
            <tr>
                <td>
                    <strong>{{ Str::limit($article->title, 60) }}</strong>
                    <br><a href="{{ route('news.show', $article->slug) }}" target="_blank"
                           style="font-size:.75rem;color:var(--ms-muted);">/news/{{ $article->slug }}</a>
                </td>
                <td>{{ $article->category?->name ?? '—' }}</td>
                <td>
                    @if($article->published_at && $article->published_at <= now())
                        <span class="ms-badge ms-badge--green">Pubblicato</span>
                    @elseif($article->published_at)
                        <span class="ms-badge ms-badge--yellow">Programmato</span>
                    @else
                        <span class="ms-badge ms-badge--gray">Bozza</span>
                    @endif
                </td>
                <td style="font-size:.8125rem;color:var(--ms-muted);">
                    {{ $article->published_at?->format('d/m/Y H:i') ?? '—' }}
                </td>
                <td>
                    <div class="ms-admin-actions">
                        <a href="{{ route('admin.news.edit', $article) }}">Modifica</a>
                        <form method="POST" action="{{ route('admin.news.destroy', $article) }}"
                              onsubmit="return confirm('Eliminare questo articolo?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:var(--ms-muted);">Nessun articolo.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if($articles->hasPages())
    <div style="padding:1.25rem;">{{ $articles->links() }}</div>
    @endif
</div>
@endsection
