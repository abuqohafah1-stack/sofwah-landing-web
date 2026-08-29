<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

/**
 * resources/content/ is the source of truth for the whole site — a typo or a
 * key that exists in bm.php but not en.php breaks a page at render time, in
 * one language only. These tests catch that before a deploy does.
 */
class ContentIntegrityTest extends TestCase
{
    public function test_all_six_branches_are_present_and_well_formed(): void
    {
        $branches = require resource_path('content/branches.php');

        $this->assertCount(6, $branches);

        foreach ($branches as $branch) {
            foreach (['key', 'city', 'address', 'open', 'close', 'wa', 'maps', 'rating', 'reviews'] as $key) {
                $this->assertArrayHasKey($key, $branch, "Branch is missing '{$key}'.");
                $this->assertNotSame('', $branch[$key], "Branch '{$key}' is empty.");
            }

            $this->assertMatchesRegularExpression(
                '#^https://wasap\.my/\d{10,15}$#',
                $branch['wa'],
                "Branch {$branch['city']} has a malformed WhatsApp link."
            );

            $this->assertGreaterThan(0, (float) $branch['rating']);
            $this->assertLessThanOrEqual(5, (float) $branch['rating']);
        }

        $keys = array_column($branches, 'key');
        $this->assertSame($keys, array_unique($keys), 'Branch keys must be unique.');
    }

    #[DataProvider('translationPairs')]
    public function test_bm_and_en_content_have_matching_keys(string $bmFile, string $enFile): void
    {
        $bm = require resource_path("content/{$bmFile}");
        $en = require resource_path("content/{$enFile}");

        $this->assertSame(
            $this->keyShape($bm),
            $this->keyShape($en),
            "{$bmFile} and {$enFile} have diverged — every key must exist in both."
        );
    }

    public static function translationPairs(): array
    {
        return [
            'landing' => ['bm.php', 'en.php'],
            'career'  => ['career/bm.php', 'career/en.php'],
        ];
    }

    /**
     * The named-key skeleton of a content array. List entries (numeric keys)
     * are skipped — how many menu items or FAQs each language carries is
     * content, not structure.
     */
    private function keyShape(array $content): array
    {
        $shape = [];

        foreach ($content as $key => $value) {
            if (is_int($key)) {
                continue;
            }
            $shape[$key] = is_array($value) ? $this->keyShape($value) : true;
        }

        ksort($shape);

        return $shape;
    }
}
