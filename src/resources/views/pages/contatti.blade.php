@extends('layouts.app')

@section('title', 'Contattaci')
@section('description', 'Raccontaci le esigenze della tua Sezione CAI: ti risponderemo entro 48 ore.')

@section('content')

<section class="ms-typeform-wrapper">
    <iframe
        src="{{ $typeformUrl }}{{ $source ? '?source=' . e($source) : '' }}"
        frameborder="0"
        allow="camera; microphone; autoplay; encrypted-media;"
        class="ms-typeform-iframe"
        title="Modulo di contatto Montagna Servizi SCPA">
    </iframe>
</section>

@endsection
