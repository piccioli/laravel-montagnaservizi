@extends('layouts.admin')
@section('title', $member ? 'Modifica membro CdA' : 'Nuovo membro CdA')

@section('content')
<form method="POST"
      action="{{ $member ? route('admin.governance.update', $member->id) : route('admin.governance.store') }}"
      enctype="multipart/form-data"
      class="ms-admin-form">
    @csrf
    @if($member) @method('PUT') @endif

    <div class="ms-field-row">
        <div class="ms-field">
            <label for="name">Nome completo <span style="color:#dc2626">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $member?->name) }}" required>
            @error('name')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="ms-field">
            <label for="role">Ruolo / Carica <span style="color:#dc2626">*</span></label>
            <input type="text" id="role" name="role" value="{{ old('role', $member?->role) }}" required
                   placeholder="es. Presidente, Consigliere">
            @error('role')<p class="ms-field-error">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="ms-field">
        <label for="mandate_info">Info mandato</label>
        <input type="text" id="mandate_info" name="mandate_info"
               value="{{ old('mandate_info', $member?->mandate_info) }}"
               placeholder="es. Triennio 2024–2027">
    </div>

    <div class="ms-field">
        <label for="bio">Bio</label>
        <textarea id="bio" name="bio" style="min-height:100px;">{{ old('bio', $member?->bio) }}</textarea>
    </div>

    <div class="ms-field">
        <label for="photo">Foto</label>
        @if($member?->photo)
            <p style="margin-bottom:.5rem;">
                <img src="{{ Storage::url($member->photo) }}" alt="" style="height:64px;width:64px;border-radius:50%;object-fit:cover;">
            </p>
        @endif
        <input type="file" id="photo" name="photo" accept="image/*">
        <p class="ms-field__hint">JPEG/PNG/WebP, max 4 MB.</p>
        @error('photo')<p class="ms-field-error">{{ $message }}</p>@enderror
    </div>

    <div class="ms-field-row">
        <div class="ms-field">
            <label for="sort_order">Ordine</label>
            <input type="number" id="sort_order" name="sort_order" min="0"
                   value="{{ old('sort_order', $member?->sort_order ?? 0) }}">
        </div>
        <div class="ms-field" style="display:flex;align-items:flex-end;padding-bottom:.375rem;">
            <label class="ms-toggle">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $member?->is_active ?? true) ? 'checked' : '' }}>
                <span class="ms-toggle__track"></span>
                <span style="font-size:.875rem;font-weight:500;">Visibile sul sito</span>
            </label>
        </div>
    </div>

    <div style="display:flex;gap:1rem;margin-top:1.5rem;">
        <button type="submit" class="ms-btn ms-btn--primary">
            {{ $member ? 'Salva modifiche' : 'Crea membro' }}
        </button>
        <a href="{{ route('admin.governance.index') }}" class="ms-btn ms-btn--outline">Annulla</a>
    </div>
</form>
@endsection
