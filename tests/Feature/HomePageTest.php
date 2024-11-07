<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * Checking the availability of the main page.
     */
    public function testHomePageIsAccessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
