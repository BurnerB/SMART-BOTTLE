<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.00</priority>
    </url>
    <sitemap>
        <loc>{{ url('/').'/sitemap.xml/wines' }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/').'/sitemap.xml/beers' }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/').'/sitemap.xml/spirits' }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ url('/').'/sitemap.xml/extras' }}</loc>
    </sitemap>

</sitemapindex>
