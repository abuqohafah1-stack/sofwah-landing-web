<?php

namespace Tests\Feature;

use Tests\TestCase;

class SitemapTest extends TestCase
{
    public function test_sitemap_is_served_as_xml(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee('<urlset', false);
    }

    /**
     * Every public page, both languages. /kerjaya was missing here once — it
     * cost the career page its indexing, so each URL is asserted explicitly.
     */
    public function test_sitemap_lists_every_public_page_in_both_languages(): void
    {
        config(['app.url' => 'https://sofwaharabicgrill.com']);

        $response = $this->get('/sitemap.xml');

        foreach ([
            'https://sofwaharabicgrill.com/',
            'https://sofwaharabicgrill.com/?lang=en',
            'https://sofwaharabicgrill.com/kerjaya',
            'https://sofwaharabicgrill.com/kerjaya?lang=en',
        ] as $url) {
            $response->assertSee('<loc>' . htmlspecialchars($url, ENT_XML1) . '</loc>', false);
        }
    }

    public function test_sitemap_covers_every_routed_page(): void
    {
        $body = $this->get('/sitemap.xml')->getContent();

        // A page added to routes/web.php but forgotten here would be invisible
        // to Google. /career is an alias of /kerjaya, so it is not listed.
        foreach (['/kerjaya'] as $path) {
            $this->assertStringContainsString($path, $body, "Sitemap is missing {$path}.");
        }
    }
}
