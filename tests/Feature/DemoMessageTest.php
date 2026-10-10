<?php

namespace Tests\Feature;

use App\Models\DemoMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class DemoMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_homepage_shows_the_message_form_and_empty_state(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Save to MySQL')
            ->assertSee('Connected to SQLite · 0 rows')
            ->assertSee('No messages yet.');
    }

    public function test_the_homepage_reads_messages_from_the_database_newest_first(): void
    {
        DemoMessage::factory()->create(['message' => 'First message']);
        DemoMessage::factory()->create(['message' => 'Second message']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('2 rows')
            ->assertSeeInOrder(['Second message', 'First message']);
    }

    public function test_a_message_is_saved_and_shown_after_redirect(): void
    {
        $response = $this->post(route('demo-messages.store'), ['message' => 'Hello from KosICT 2026']);

        $message = DemoMessage::sole();

        $response->assertRedirectToRoute('home')
            ->assertSessionHas('savedMessageId', $message->id);

        $this->assertSame('Hello from KosICT 2026', $message->message);

        $this->get(route('home'))
            ->assertSee('Hello from KosICT 2026')
            ->assertSee('1 row');
    }

    public function test_the_message_is_required(): void
    {
        $this->post(route('demo-messages.store'), ['message' => ''])
            ->assertSessionHasErrors('message');

        $this->assertDatabaseCount('demo_messages', 0);
    }

    public function test_the_message_may_not_exceed_255_characters(): void
    {
        $this->post(route('demo-messages.store'), ['message' => Str::repeat('a', 256)])
            ->assertSessionHasErrors('message');

        $this->assertDatabaseCount('demo_messages', 0);
    }

    public function test_messages_are_escaped_when_displayed(): void
    {
        DemoMessage::factory()->create(['message' => '<script>alert("x")</script>']);

        $this->get(route('home'))
            ->assertDontSee('<script>alert("x")</script>', false)
            ->assertSee('&lt;script&gt;', false);
    }
}
