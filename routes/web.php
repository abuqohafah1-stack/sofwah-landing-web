<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// robots.txt is a static file at public/robots.txt — Forge's nginx has a
// `location = /robots.txt` block that serves it directly (a Laravel route would
// never be reached), so it must be a real file, not a route.

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
