@props(['member'])

@php
    $initials = collect(explode(' ', $member->name))
        ->map(fn($w) => strtoupper($w[0] ?? ''))
        ->take(2)
        ->implode('');
@endphp

<article class="ms-team-card">
    <div class="ms-team-card__photo">
        @if($member->photo)
            <img src="{{ Storage::url($member->photo) }}"
                 alt="{{ $member->name }}"
                 loading="lazy">
        @else
            <div class="ms-team-card__initials" aria-hidden="true">{{ $initials }}</div>
        @endif
    </div>
    <div class="ms-team-card__body">
        <h4>{{ $member->name }}</h4>
        <p class="ms-team-role">{{ $member->role }}</p>
        @if($member->bio)
            <p class="ms-team-bio">{{ Str::limit($member->bio, 120) }}</p>
        @endif
    </div>
</article>
