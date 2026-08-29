<?php

namespace Tests\Feature;

use Tests\TestCase;

class CareerPageTest extends TestCase
{
    public function test_kerjaya_renders_in_bm_by_default(): void
    {
        $career = require resource_path('content/career/bm.php');

        $this->get('/kerjaya')
            ->assertOk()
            ->assertSee('<html lang="ms"', false)
            ->assertSee($career['meta_title'], false);
    }

    public function test_career_is_an_alias_of_kerjaya(): void
    {
        $career = require resource_path('content/career/bm.php');

        $this->get('/career')
            ->assertOk()
            ->assertSee($career['meta_title'], false);
    }

    public function test_lang_en_switches_the_page_to_english(): void
    {
        $career = require resource_path('content/career/en.php');

        $this->get('/kerjaya?lang=en')
            ->assertOk()
            ->assertSee('<html lang="en"', false)
            ->assertSee($career['meta_title'], false);
    }

    public function test_canonical_points_at_kerjaya_not_the_landing_page(): void
    {
        config(['app.url' => 'https://sofwaharabicgrill.com']);

        $this->get('/kerjaya')
            ->assertSee('<link rel="canonical" href="https://sofwaharabicgrill.com/kerjaya">', false);

        $this->get('/kerjaya?lang=en')
            ->assertSee('<link rel="canonical" href="https://sofwaharabicgrill.com/kerjaya?lang=en">', false);
    }

    /**
     * The apply button must follow config, so HR can be given its own line via
     * WHATSAPP_HR in .env without touching any code.
     */
    public function test_apply_button_uses_the_configured_hr_whatsapp_number(): void
    {
        config(['sofwah.whatsapp_hr' => '60999888777']);

        $this->get('/kerjaya')
            ->assertOk()
            ->assertSee('https://wa.me/60999888777', false);
    }

    public function test_hr_number_defaults_to_the_order_number_when_unset(): void
    {
        $this->assertSame(
            config('sofwah.whatsapp_default'),
            config('sofwah.whatsapp_hr'),
            'With WHATSAPP_HR unset, the career page should fall back to the default order number.'
        );
    }
}
