@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

<div class="ms-admin-stats-grid">
    <div class="ms-admin-stat-card">
        <span class="ms-admin-stat-icon">📰</span>
        <div>
            <p class="ms-admin-stat-label">Articoli pubblicati</p>
            <p class="ms-admin-stat-value">{{ $stats['news_published'] }} / {{ $stats['news_total'] }}</p>
        </div>
    </div>
    <div class="ms-admin-stat-card">
        <span class="ms-admin-stat-icon">⚙️</span>
        <div>
            <p class="ms-admin-stat-label">Servizi</p>
            <p class="ms-admin-stat-value">{{ $stats['services'] }}</p>
        </div>
    </div>
    <div class="ms-admin-stat-card">
        <span class="ms-admin-stat-icon">👥</span>
        <div>
            <p class="ms-admin-stat-label">Membri del team</p>
            <p class="ms-admin-stat-value">{{ $stats['team_members'] }}</p>
        </div>
    </div>
    <div class="ms-admin-stat-card">
        <span class="ms-admin-stat-icon">🏛️</span>
        <div>
            <p class="ms-admin-stat-label">Governance attiva</p>
            <p class="ms-admin-stat-value">{{ $stats['governance'] }}</p>
        </div>
    </div>
</div>

<div class="ms-admin-card" style="margin-top:2rem;">
    <h2 style="font-size:1rem;margin-bottom:1.25rem;">Articoli recenti</h2>
    <table class="ms-admin-table">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Stato</th>
                <th>Aggiornato</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestNews as $article)
            <tr>
                <td><strong>{{ Str::limit($article->title, 60) }}</strong></td>
                <td>{{ $article->category?->name ?? '—' }}</td>
                <td>
                    @if($article->published_at && $article->published_at <= now())
                        <span class="ms-badge ms-badge--green">Pubblicato</span>
                    @else
                        <span class="ms-badge ms-badge--gray">Bozza</span>
                    @endif
                </td>
                <td style="font-size:.8125rem;color:var(--ms-muted);">{{ $article->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', $article) }}" style="font-size:.8125rem;">Modifica</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
