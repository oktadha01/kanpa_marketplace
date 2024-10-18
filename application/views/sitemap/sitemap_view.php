<?php header("Content-Type: application/xml; charset=utf-8"); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap-image/1.1">

    <!-- home page 1.0 -->
    <url>
        <loc><?php echo base_url(); ?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s+00:00', time()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo base_url('Properti/dijual'); ?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s+00:00', time()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo base_url('Properti/disewa'); ?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s+00:00', time()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo base_url('Simulasi_KPR'); ?></loc>
        <lastmod><?php echo date('Y-m-d\TH:i:s+00:00', time()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <!-- properi rumah 0.9 -->
    <?= $url_properti_rumah; ?>

    <!-- properti perumahan 0.85 -->
    <?= $url_properti_perumahan; ?>
    <!-- properti proyek baru 0.85 -->
    <?= $url_properti_proyek_baru; ?>

    <!-- detail properti 0.8 -->
    <?= $url_detail_properti; ?>

    <!-- artikel 0.7 -->
    <?= $url_artikel; ?>
    <!-- properti ruko 0.7 -->
    <?= $url_properti_ruko; ?>

    <!-- proerti kavling 0.6 -->
    <!-- <url>
        <loc>https://example.com/properti-kavling/</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url> -->

    <!-- tag artikel 0.5 -->
    <?= $url_tag_artikel; ?>

    <!-- detail artikel 0.5 -->
    <?= $url_detail_artikel; ?>
</urlset>