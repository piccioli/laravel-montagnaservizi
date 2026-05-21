@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->excerpt ?? Str::limit(strip_tags($article->body), 160))
@section('og_type', 'article')
@if($article->cover_image)
    @section('og_image', Storage::url($article->cover_image))
@endif

@push('og_extra')
    @if($article->published_at)
    <meta property="article:published_time" content="{{ $article->published_at->toIso8601String() }}">
    @endif
    @if($article->updated_at)
    <meta property="article:modified_time"  content="{{ $article->updated_at->toIso8601String() }}">
    @endif
    @if($article->category)
    <meta property="article:section"        content="{{ $article->category->name }}">
    @endif
@endpush

@push('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "headline": {{ Js::from($article->title) }},
    "description": {{ Js::from($article->excerpt ?? Str::limit(strip_tags($article->body), 160)) }},
    "url": "{{ url()->current() }}",
    @if($article->cover_image)
    "image": "{{ Storage::url($article->cover_image) }}",
    @endif
    @if($article->published_at)
    "datePublished": "{{ $article->published_at->toIso8601String() }}",
    @endif
    @if($article->updated_at)
    "dateModified": "{{ $article->updated_at->toIso8601String() }}",
    @endif
    "publisher": {
        "@type": "Organization",
        "name": "Montagna Servizi SCPA",
        "url": "{{ config('app.url') }}"
    }
}
</script>
@endpush

@section('content')

{{-- Hero compatto con metadati --}}
<section class="ms-hero ms-hero--inner">
    <div class="l-container">
        <div class="ms-hero__inner">
            <div class="ms-article-meta-top">
                @if($article->category)
                    <span class="ms-news-cat">{{ $article->category->name }}</span>
                @endif
                <time class="ms-article-date" datetime="{{ $article->published_at?->format('Y-m-d') }}">
                    {{ $article->published_at?->translatedFormat('d F Y') }}
                </time>
            </div>
            <h1>{{ $article->title }}</h1>
            @if($article->excerpt)
                <p class="ms-hero__sub">{{ $article->excerpt }}</p>
            @endif
        </div>
    </div>
</section>

{{-- Immagine di copertina --}}
@if($article->cover_image)
<div class="ms-article-cover">
    <div class="l-container">
        <img src="{{ Storage::url($article->cover_image) }}"
             alt="{{ $article->title }}"
             class="ms-article-cover__img">
    </div>
</div>
@endif

{{-- Corpo articolo --}}
<section class="l-section">
    <div class="l-container">
        <div class="ms-article-layout">

            <article class="ms-article-body ms-prose">
                {!! $article->body !!}
            </article>

            <aside class="ms-article-sidebar">
                {{-- Condivisione --}}
                <div class="ms-article-share">
                    <p class="ms-article-share__label">Condividi</p>
                    <div class="ms-article-share__links">
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener noreferrer" class="ms-share-btn ms-share-btn--linkedin">
                            LinkedIn
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener noreferrer" class="ms-share-btn ms-share-btn--facebook">
                            Facebook
                        </a>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="ms-service-sidebar-box" style="margin-top:1.5rem;">
                    <h3>Hai bisogno di supporto?</h3>
                    <p>Raccontaci le esigenze della tua Sezione.</p>
                    <a href="{{ config('services.typeform.url') }}" target="_blank" rel="noopener"
                       class="ms-btn ms-btn--primary" style="display:block;text-align:center;margin-top:1rem;">
                        Contattaci
                    </a>
                </div>
            </aside>

        </div>

        {{-- Naviga --}}
        <div class="ms-article-nav">
            <a href="{{ route('news.index') }}" class="ms-btn ms-btn--outline">
                &larr; Torna alle news
            </a>
        </div>
    </div>
</section>

@endsection
