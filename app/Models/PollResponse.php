<?php

namespace App\Models;

use Database\Factories\PollResponseFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['backup_choice', 'deploy_choice', 'slack_choice'])]
class PollResponse extends Model
{
    /** @use HasFactory<PollResponseFactory> */
    use HasFactory;

    /**
     * The poll questions, keyed by column, with answers keyed by their stored number.
     *
     * @var array<string, array{question: string, answers: array<int, string>}>
     */
    public const QUESTIONS = [
        'backup_choice' => [
            'question' => 'How does your team handle database backups?',
            'answers' => [
                1 => 'Automated and tested, obviously ✅',
                2 => 'Automated, never tested 😬',
                3 => 'Thoughts and prayers 🙏',
                4 => 'Wait, we have backups? 💀',
            ],
        ],
        'deploy_choice' => [
            'question' => "What's your current deploy strategy?",
            'answers' => [
                1 => 'Push to deploy 🚀',
                2 => 'SSH in and git pull',
                3 => 'FTP and vibes ✨',
                4 => 'Friday at 4:59 PM 🔥',
            ],
        ],
        'slack_choice' => [
            'question' => 'Scariest message to get in Slack?',
            'answers' => [
                1 => '"quick question about prod"',
                2 => '"who has the DB password?"',
                3 => '"it works on my machine"',
                4 => '"did anyone change anything?" 👀',
            ],
        ],
    ];
}
