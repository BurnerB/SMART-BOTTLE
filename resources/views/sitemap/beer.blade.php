
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($beer as $content)
        <url>

            <loc>{{ url('/').'/beers' }}</loc>
            <lastmod>{{ $content->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.3</priority>
        </url>
    @endforeach
</urlset>
