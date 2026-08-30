<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_landing_renders_in_bm_by_default(): void
    {
        $bm = require resource_path('content/bm.php');

        $this->get('/')
            ->assertOk()
            ->assertSee('<html lang="ms"', false)
            ->assertSee($bm['meta']['title'], false);
    }

    public function test_lang_en_switches_the_page_to_english(): void
    {
        $en = require resource_path('content/en.php');

        $this->get('/?lang=en')
            ->assertOk()
            ->assertSee('<html lang="en"', false)
            ->assertSee($en['meta']['title'], false);
    }

    public function test_unknown_lang_falls_back_to_bm(): void
    {
        $this->get('/?lang=fr')
            ->assertOk()
            ->assertSee('<html lang="ms"', false);
    }

    public function test_canonical_points_at_the_right_url_per_language(): void
    {
        config(['app.url' => 'https://sofwaharabicgrill.com']);

        $this->get('/')
            ->assertSee('<link rel="canonical" href="https://sofwaharabicgrill.com/">', false);

        $this->get('/?lang=en')
            ->assertSee('<link rel="canonical" href="https://sofwaharabicgrill.com/?lang=en">', false);
    }

    public function test_every_branch_appears_on_the_page(): void
    {
        $branches = require resource_path('content/branches.php');
        $response = $this->get('/');

        foreach ($branches as $branch) {
            $response->assertSee($branch['city'], false);
            $response->assertSee($branch['wa'], false);
        }
    }

    public function test_structured_data_and_analytics_are_emitted(): void
    {
        $this->get('/')
            ->assertSee('application/ld+json', false)
            ->assertSee('"@type":"Restaurant"', false)
            ->assertSee(config('sofwah.ga4'), false);
    }
}
