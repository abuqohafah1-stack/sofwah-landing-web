<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// robots.txt (dynamic so the sitemap URL follows APP_URL per environment)
Route::get('/robots.txt', function () {
    $base = rtrim(config('app.url') ?: url('/'), '/');
    $body = "User-agent: *\nAllow: /\nSitemap: {$base}/sitemap.xml\n";

    return response($body, 200, ['Content-Type' => 'text/plain']);
});

// XML sitemap (single-page site, BM + EN)
Route::get('/sitemap.xml', function () {
    $base = rtrim(config('app.url') ?: url('/'), '/');
    $urls = [$base . '/', $base . '/?lang=en'];

    $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $u) {
        $xml .= '<url><loc>' . htmlspecialchars($u, ENT_XML1) . '</loc>'
              . '<changefreq>weekly</changefreq><priority>1.0</priority></url>';
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
