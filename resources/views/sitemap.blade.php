<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ Carbon\Carbon::today()->format('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>

    @foreach($links as $link)
        <url>
            <loc>{{ $link['url'] }}</loc>
            <lastmod>{{ $link['lastmod'] }}</lastmod>
            <changefreq>{{ $link['changefreq'] }}</changefreq>
            <priority>{{ $link['priority'] }}</priority>
        </url>
    @endforeach

</urlset>