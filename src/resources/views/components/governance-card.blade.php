@props(['member'])

@php
    $initials = collect(explode(' ', $member->name))
        ->map(fn($w) => strtoupper($w[0] ?? ''))
        ->take(2)
        ->implode('');
@endphp

<article class="ms-governance-card">
    <div class="ms-governance-card__avatar">
        @if($member->photo)
            <img src="{{ Storage::url($member->photo) }}"
                 alt="{{ $member->name }}"
                 loading="lazy">
        @else
            <div class="ms-governance-card__initials" aria-hidden="true">{{ $initials }}</div>
        @endif
    </div>
    <div class="ms-governance-card__body">
        <h4>{{ $member->name }}</h4>
        <p class="ms-governance-role">{{ $member->role }}</p>
        @if($member->mandate_info)
            <p class="ms-governance-mandate">{{ $member->mandate_info }}</p>
        @endif
        @if($member->bio)
            <p style="font-size:.875rem;color:var(--ms-muted);margin-top:.5rem">{{ $member->bio }}</p>
        @endif
    </div>
</article>
