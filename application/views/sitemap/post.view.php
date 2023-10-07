<?php
header("Content-Type: text/xml;charset=utf-8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance" xmlns:image="https://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9 https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>https://<?= SITES_URL ?>/sitemap.xml</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>


</urlset>