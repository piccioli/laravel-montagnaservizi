@extends('layouts.admin')
@section('title', 'Servizi')

@section('actions')
    <a href="{{ route('admin.services.create') }}" class="ms-btn ms-btn--primary ms-btn--sm">+ Nuovo servizio</a>
@endsection

@section('content')
<div class="ms-admin-card">
    <table class="ms-admin-table">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Slug</th>
                <th>Ordine</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td><strong>{{ $service->title }}</strong>
                    @if($service->subtitle)
                        <br><span style="font-size:.8125rem;color:var(--ms-muted);">{{ $service->subtitle }}</span>
                    @endif
                </td>
                <td><span class="ms-badge ms-badge--gray">{{ $categoryMap[$service->category_slug] ?? $service->category_slug }}</span></td>
                <td><code style="font-size:.8125rem;">{{ $service->slug }}</code></td>
                <td>{{ $service->sort_order }}</td>
                <td>
                    <div class="ms-admin-actions">
                        <a href="{{ route('admin.services.edit', $service->id) }}">Modifica</a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}"
                              onsubmit="return confirm('Eliminare questo servizio?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:var(--ms-muted);">Nessun servizio.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if($services->hasPages())
    <div style="padding:1.25rem;">{{ $services->links() }}</div>
    @endif
</div>
@endsection
