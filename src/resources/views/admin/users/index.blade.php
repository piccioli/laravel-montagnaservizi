@extends('layouts.admin')
@section('title', 'Utenti')

@section('content')
<div class="ms-admin-card" style="max-width:480px;">
    <p style="font-size:.875rem;color:var(--ms-muted);margin-bottom:1.5rem;">
        Pannello utente — account admin attivo.
    </p>
    <table class="ms-admin-table" style="margin-bottom:1.5rem;">
        <tbody>
            <tr>
                <td style="font-weight:500;width:120px;">Nome</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td style="font-weight:500;">Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td style="font-weight:500;">Ruolo</td>
                <td><span class="ms-badge ms-badge--green">{{ $user->role }}</span></td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('admin.users.password') }}" class="ms-btn ms-btn--outline ms-btn--sm">
        Cambia password
    </a>
</div>
@endsection
