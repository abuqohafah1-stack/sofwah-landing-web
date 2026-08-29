<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // public/build is a deploy artifact (gitignored, created by `npm run
        // build`), so it is absent on a fresh checkout. Stub the Vite tags out
        // — these tests assert markup and content, not bundled assets.
        $this->withoutVite();
    }
}
