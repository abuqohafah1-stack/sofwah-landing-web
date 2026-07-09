<?php

/*
|--------------------------------------------------------------------------
| SOFWAH-WEB app config
|--------------------------------------------------------------------------
| Set these in .env (never commit). GA4 stays inert until an ID is provided.
*/

return [
    // GA4 Measurement ID, e.g. "G-XXXXXXXXXX". Null = analytics disabled.
    'ga4' => env('GA4_ID'),

    // Default WhatsApp order number (fallback). Per-branch numbers live in
    // resources/content/branches.php.
    'whatsapp_default' => env('WHATSAPP_ORDER_DEFAULT', '60142288956'),
];
