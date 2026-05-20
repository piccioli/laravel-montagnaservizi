@extends('layouts.app')

@section('title', 'Pagina non trovata')

@section('content')
<section class="l-section" style="min-height:60vh;display:flex;align-items:center;">
    <div class="l-container" style="text-align:center;">
        <p style="font-size:5rem;font-weight:700;color:var(--ms-green-light);margin:0;line-height:1;">404</p>
        <h1 style="margin-top:.5rem;">Pagina non trovata</h1>
        <p style="color:var(--ms-muted);max-width:480px;margin:1rem auto 2rem;">
            La pagina che stai cercando non esiste o è stata spostata.
        </p>
        <a href="/" class="ms-btn ms-btn--primary">Torna alla home</a>
    </div>
</section>
@endsection
