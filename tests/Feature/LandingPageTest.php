<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
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

    public function test_the_landing_page_shows_the_upcoming_polls_as_previews(): void
    {
        $response = $this->get(route('home'));

        $response->assertSeeInOrder(['Production Confessions', 'Database Backups', 'Deploy Strategies', 'Production Nightmares'])
            ->assertSee('Coming soon')
            ->assertDontSee('<form', false);
    }

    public function test_the_landing_page_renders_without_a_database(): void
    {
        config([
            'session.driver' => 'database',
            'database.connections.sqlite.database' => '/nonexistent/database.sqlite',
        ]);

        $this->get(route('home'))->assertOk();
    }
}
