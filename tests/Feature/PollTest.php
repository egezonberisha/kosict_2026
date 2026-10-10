<?php

namespace Tests\Feature;

use App\Models\PollResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PollTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_homepage_shows_the_poll(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Production Confessions')
            ->assertSeeInOrder([
                'How does your team handle database backups?',
                'Automated and tested, obviously ✅',
                'Wait, we have backups? 💀',
                'What&#039;s your current deploy strategy?',
                'Friday at 4:59 PM 🔥',
                'Scariest message to get in Slack?',
                '&quot;did anyone change anything?&quot; 👀',
                'Submit My Confessions 🔥',
            ], false);
    }

    public function test_a_vote_is_saved_and_redirects_to_the_results(): void
    {
        $this->post(route('vote'), ['backup_choice' => 3, 'deploy_choice' => 1, 'slack_choice' => 4])
            ->assertRedirectToRoute('results');

        $this->assertDatabaseHas('poll_responses', ['backup_choice' => 3, 'deploy_choice' => 1, 'slack_choice' => 4]);
    }

    public function test_every_question_requires_an_answer_between_1_and_4(): void
    {
        $this->post(route('vote'), ['backup_choice' => 0, 'deploy_choice' => 5])
            ->assertSessionHasErrors(['backup_choice', 'deploy_choice', 'slack_choice']);

        $this->assertDatabaseCount('poll_responses', 0);
    }

    public function test_the_results_page_shows_the_vote_counts(): void
    {
        PollResponse::factory()->count(3)->create(['backup_choice' => 4]);
        PollResponse::factory()->create(['backup_choice' => 1]);

        $this->get(route('results'))
            ->assertOk()
            ->assertSee('4 confessions')
            ->assertSeeInOrder(['Automated and tested, obviously ✅', '25%', 'Wait, we have backups? 💀', '75%']);
    }
}
