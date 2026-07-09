<?php

namespace App\Http\Controllers;

use App\Support\StructuredData;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Public brand landing (single page). BM is primary; ?lang=en toggles EN.
     * Content is loaded from resources/content/{lang}.php (source of truth).
     */
    public function index(Request $request)
    {
        $lang = $request->query('lang') === 'en' ? 'en' : 'bm';

        $content  = require resource_path("content/{$lang}.php");
        $branches = require resource_path('content/branches.php');

        $baseUrl   = rtrim(config('app.url') ?: $request->getSchemeAndHttpHost(), '/');
        $canonical = $baseUrl . '/' . ($lang === 'en' ? '?lang=en' : '');
        $schema    = StructuredData::build($content, $branches, $lang, $baseUrl);

        return view('landing', [
            'c'          => $content,
            'lang'       => $lang,
            'branches'   => $branches,
            'canonical'  => $canonical,
            'schemaJson' => json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ]);
    }
}
