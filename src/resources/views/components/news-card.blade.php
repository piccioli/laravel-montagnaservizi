@props(['article'])

<article class="ms-news-card">
    <a href="/news/{{ $article->slug }}" class="ms-news-card__img-wrap" tabindex="-1" aria-hidden="true">
        @if($article->cover_image)
            <img src="{{ Storage::url($article->cover_image) }}"
                 alt="{{ $article->title }}"
                 loading="lazy">
        @else
            <div class="ms-news-card__img-placeholder" aria-hidden="true">📰</div>
        @endif
    </a>
    <div class="ms-news-card__body">
        @if($article->category)
            <span class="ms-news-cat">{{ $article->category->name }}</span>
        @endif
        <h3><a href="/news/{{ $article->slug }}">{{ $article->title }}</a></h3>
        <p class="ms-news-date">
            <time datetime="{{ $article->published_at?->format('Y-m-d') }}">
                {{ $article->published_at?->translatedFormat('d M Y') }}
            </time>
        </p>
        @if($article->excerpt)
            <p class="ms-news-excerpt">{{ Str::limit($article->excerpt, 120) }}</p>
        @endif
    </div>
</article>
