<?php

namespace App\Support;

/**
 * Builds the JSON-LD @graph for the landing page. Dependency-free (plain PHP)
 * so it is unit-testable in isolation. Only real data is emitted — AggregateRating
 * is intentionally omitted until real review counts are available (ratingCount is
 * required for valid AggregateRating). Street address + opening hours are TODO
 * (city-level address only) until the CEO provides them.
 */
class StructuredData
{
    public static function build(array $content, array $branches, string $lang, string $baseUrl): array
    {
        $baseUrl = rtrim($baseUrl, '/');

        $organization = [
            '@type'     => 'Organization',
            '@id'       => $baseUrl . '/#organization',
            'name'      => 'Sofwah Arabic Grill',
            'legalName' => 'Sofwah Arabiata (M) Sdn. Bhd.',
            'url'       => $baseUrl . '/',
            'logo'      => $baseUrl . '/images/brand/logo-sofwah-white-square.png',
            'sameAs'    => [
                'https://www.tiktok.com/@sofwah_arabicgrill',
                'https://www.facebook.com/sofwah_arabicgrill',
            ],
        ];

        $restaurants = [];
        foreach ($branches as $b) {
            $name  = 'Sofwah ' . $b['city'] . (! empty($b['area']) ? ' — ' . $b['area'] : '');
            $phone = '+' . ltrim(substr(strrchr($b['wa'], '/'), 1), '+'); // wasap.my/60142... -> +60142...

            $address = [
                '@type'           => 'PostalAddress',
                'addressLocality' => $b['city'],
                'addressRegion'   => 'Kedah',
                'addressCountry'  => 'MY',
            ];
            if (! empty($b['street']))   $address['streetAddress'] = $b['street'];
            if (! empty($b['postcode'])) $address['postalCode']    = $b['postcode'];

            $node = [
                '@type'              => 'Restaurant',
                '@id'                => $baseUrl . '/#branch-' . $b['key'],
                'name'               => $name,
                'url'                => $baseUrl . '/#cawangan',
                'image'              => $baseUrl . '/images/hero/cover-home-1920.jpg',
                'servesCuisine'      => ['Arabic', 'Middle Eastern', 'Halal'],
                'priceRange'         => $b['price'] ?? '$$',
                'telephone'          => $phone,
                'parentOrganization' => ['@id' => $baseUrl . '/#organization'],
                'address'            => $address,
                'areaServed'         => $b['city'] . ', Kedah',
                'hasMap'             => $b['maps'],
            ];

            if (! empty($b['open']) && ! empty($b['close'])) {
                $node['openingHoursSpecification'] = [[
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    'opens'     => $b['open'],
                    'closes'    => $b['close'],
                ]];
            }

            if (! empty($b['lat']) && ! empty($b['lng'])) {
                $node['geo'] = [
                    '@type'     => 'GeoCoordinates',
                    'latitude'  => $b['lat'],
                    'longitude' => $b['lng'],
                ];
            }

            // Real Google review count → valid AggregateRating (only where known).
            if (! empty($b['reviews'])) {
                $node['aggregateRating'] = [
                    '@type'       => 'AggregateRating',
                    'ratingValue' => $b['rating'],
                    'reviewCount' => $b['reviews'],
                    'bestRating'  => '5',
                ];
            }

            $restaurants[] = $node;
        }

        $faq = [
            '@type'      => 'FAQPage',
            '@id'        => $baseUrl . '/#faq',
            'mainEntity' => array_map(fn ($item) => [
                '@type'          => 'Question',
                'name'           => $item['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
            ], $content['faq']['items']),
        ];

        return [
            '@context' => 'https://schema.org',
            '@graph'   => array_merge([$organization], $restaurants, [$faq]),
        ];
    }
}
