<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        <url>
            <loc>{{ url($post['url']) }}</loc>
            <lastmod>{{ $post['updated_at'] }}</lastmod>
            @if ($post['freq'] != '-')
            <changefreq>{{ $post['freq'] }}</changefreq>
            @endif
            @if ($post['priority'] != '-')
            <priority>{{ $post['priority'] }}</priority>
            @endif
        </url>
    @endforeach
</urlset>
