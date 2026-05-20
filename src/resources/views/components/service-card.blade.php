@props(['icon' => null, 'title', 'description', 'href', 'linkText' => 'Scopri'])

<article class="ms-service-card">
    @if($icon)
        <div class="ms-service-card__icon" aria-hidden="true">{{ $icon }}</div>
    @endif
    <h3>{{ $title }}</h3>
    <p>{{ $description }}</p>
    <a href="{{ $href }}" class="ms-service-card__link">{{ $linkText }} &rarr;</a>
</article>
