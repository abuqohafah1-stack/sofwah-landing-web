<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/kerjaya', [CareerController::class, 'index'])->name('career');
Route::get('/career', [CareerController::class, 'index']);

// robots.txt is a static file at public/robots.txt — Forge's nginx has a
// `location = /robots.txt` block that serves it directly (a Laravel route would
// never be reached), so it must be a real file, not a route.

// XML sitemap — every public page, both languages. The BM URL is the canonical
// one for each page (see the controllers); ?lang=en is the EN variant.
Route::get('/sitemap.xml', function () {
    $base = rtrim(config('app.url') ?: url('/'), '/');

    // [path, priority] — landing first, then career.
    $pages = [
        ['/', '1.0'],
        ['/kerjaya', '0.8'],
    ];

    $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($pages as [$path, $priority]) {
        foreach ([$base . $path, $base . $path . '?lang=en'] as $u) {
            $xml .= '<url><loc>' . htmlspecialchars($u, ENT_XML1) . '</loc>'
                  . '<changefreq>weekly</changefreq><priority>' . $priority . '</priority></url>';
        }
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
