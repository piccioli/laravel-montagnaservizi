@extends('layouts.admin')
@section('title', 'Cambia password')

@section('content')
<form method="POST" action="{{ route('admin.users.password.update') }}" class="ms-admin-form">
    @csrf @method('PUT')

    <div class="ms-field">
        <label for="current_password">Password attuale <span style="color:#dc2626">*</span></label>
        <input type="password" id="current_password" name="current_password" required autocomplete="current-password">
        @error('current_password')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field">
        <label for="password">Nuova password <span style="color:#dc2626">*</span></label>
        <input type="password" id="password" name="password" required autocomplete="new-password">
        <p class="ms-field__hint">Minimo 8 caratteri.</p>
        @error('password')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field">
        <label for="password_confirmation">Conferma nuova password <span style="color:#dc2626">*</span></label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <div style="display:flex;gap:1rem;margin-top:1.5rem;">
        <button type="submit" class="ms-btn ms-btn--primary">Aggiorna password</button>
        <a href="{{ route('admin.users.index') }}" class="ms-btn ms-btn--outline">Annulla</a>
    </div>
</form>
@endsection
