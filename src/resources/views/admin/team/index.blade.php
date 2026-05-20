@extends('layouts.admin')
@section('title', 'Team')

@section('actions')
    <a href="{{ route('admin.team.create') }}" class="ms-btn ms-btn--primary ms-btn--sm">+ Nuovo membro</a>
@endsection

@section('content')
<div class="ms-admin-card">
    <table class="ms-admin-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ruolo</th>
                <th>Ordine</th>
                <th>Stato</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>
                    <div style="display:flex;align-items:center;gap:.75rem;">
                        <div class="ms-admin-thumb">
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}">
                            @else
                                {{ strtoupper(substr($member->name, 0, 1)) }}
                            @endif
                        </div>
                        <strong>{{ $member->name }}</strong>
                    </div>
                </td>
                <td>{{ $member->role }}</td>
                <td>{{ $member->sort_order }}</td>
                <td>
                    @if($member->is_active)
                        <span class="ms-badge ms-badge--green">Attivo</span>
                    @else
                        <span class="ms-badge ms-badge--gray">Nascosto</span>
                    @endif
                </td>
                <td>
                    <div class="ms-admin-actions">
                        <a href="{{ route('admin.team.edit', $member->id) }}">Modifica</a>
                        <form method="POST" action="{{ route('admin.team.destroy', $member->id) }}"
                              onsubmit="return confirm('Eliminare questo membro?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:var(--ms-muted);">Nessun membro.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
