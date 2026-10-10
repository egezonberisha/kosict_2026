<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_landing_page_renders_the_conference_content(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSeeInOrder([
                'Laravel Cloud:',
                'From Code to Production',
                'Without the Infrastructure Headache',
                'Build it. Push it. Deploy it.',
                'Let Laravel Cloud handle the rest.',
            ])
            ->assertSee("Anonymous confessions from developers who've seen things.", false)
            ->assertSee('Adapt.')
            ->assertSee('October 9–10, 2026')
            ->assertSee('Live demo starting soon')
            ->assertSee('images/kosict-logo.svg')
            ->assertSee('https://cloud.laravel.com');
    }
}
