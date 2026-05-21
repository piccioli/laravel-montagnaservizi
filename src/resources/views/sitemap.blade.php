{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Pagine statiche principali --}}
    <url>
        <loc>{{ config('app.url') }}/</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ config('app.url') }}/chi-siamo</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ config('app.url') }}/servizi</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>

    {{-- Pagine categoria servizi --}}
    @foreach(['segreteria-operativa','comunicazione','contabilita-veryfico','consulenze','fundraising'] as $cat)
    <url>
        <loc>{{ config('app.url') }}/servizi/{{ $cat }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Archivio news --}}
    <url>
        <loc>{{ config('app.url') }}/news</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    {{-- Articoli --}}
    @foreach($articles as $article)
    <url>
        <loc>{{ config('app.url') }}/news/{{ $article->slug }}</loc>
        <lastmod>{{ ($article->updated_at ?? $article->published_at)->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- Servizi dettaglio --}}
    @foreach($services as $service)
    <url>
        <loc>{{ config('app.url') }}/servizi/{{ $service->category_slug }}/{{ $service->slug }}</loc>
        <lastmod>{{ $service->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- Pagine legali --}}
    <url>
        <loc>{{ config('app.url') }}/privacy-policy</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ config('app.url') }}/cookie-policy</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ config('app.url') }}/note-legali</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

</urlset>
