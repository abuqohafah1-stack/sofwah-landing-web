<?php

/*
|--------------------------------------------------------------------------
| SOFWAH-WEB app config
|--------------------------------------------------------------------------
| Set these in .env (never commit). GA4 stays inert until an ID is provided.
*/

return [
    // GA4 Measurement ID. Falls back to the live Sofwah ID when GA4_ID is unset
    // or empty (a Measurement ID is public — it appears in the page HTML — so it
    // is safe to commit). Override via GA4_ID in .env if it ever changes.
    'ga4' => env('GA4_ID') ?: 'G-WSP3PRXGD6',

    // Default WhatsApp order number (fallback). Per-branch numbers live in
    // resources/content/branches.php.
    'whatsapp_default' => env('WHATSAPP_ORDER_DEFAULT', '60142288956'),
];
