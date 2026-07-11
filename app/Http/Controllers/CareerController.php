<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Career page (/kerjaya). BM primary; ?lang=en toggles EN.
     */
    public function index(Request $request)
    {
        $lang = $request->query('lang') === 'en' ? 'en' : 'bm';

        $c        = require resource_path("content/{$lang}.php");
        $career   = require resource_path("content/career/{$lang}.php");
        $org      = require resource_path('content/org.php');
        $branches = require resource_path('content/branches.php');

        // Use the career page title for <head>.
        $c['meta']['title'] = $career['meta_title'];

        $baseUrl = rtrim(config('app.url') ?: $request->getSchemeAndHttpHost(), '/');

        return view('career', [
            'c'         => $c,
            'lang'      => $lang,
            'career'    => $career,
            'org'       => $org,
            'branches'  => $branches,
            'canonical' => $baseUrl . '/kerjaya' . ($lang === 'en' ? '?lang=en' : ''),
        ]);
    }
}
