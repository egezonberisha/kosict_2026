<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDemoMessageRequest;
use App\Models\DemoMessage;
use App\Models\PollResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DemoMessageController extends Controller
{
    /**
     * Show the landing page with the poll and the latest messages read from the database.
     */
    public function index(): View
    {
        return view('welcome', [
            'questions' => PollResponse::QUESTIONS,
            'messages' => DemoMessage::query()->latest('id')->limit(10)->get(),
            'messageCount' => DemoMessage::query()->count(),
            'databaseName' => $this->databaseName(DB::connection()->getDriverName()),
        ]);
    }

    /**
     * Store a new message in the configured database.
     */
    public function store(StoreDemoMessageRequest $request): RedirectResponse
    {
        $message = DemoMessage::create($request->validated());

        return to_route('home')->with('savedMessageId', $message->id);
    }

    /**
     * Get the display name of the active database driver.
     */
    private function databaseName(string $driver): string
    {
        return match ($driver) {
            'mysql' => 'MySQL',
            'mariadb' => 'MariaDB',
            'pgsql' => 'PostgreSQL',
            'sqlite' => 'SQLite',
            default => $driver,
        };
    }
}
