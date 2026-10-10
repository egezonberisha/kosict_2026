<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePollResponseRequest;
use App\Models\PollResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PollResponseController extends Controller
{
    /**
     * Store a poll response.
     */
    public function store(StorePollResponseRequest $request): RedirectResponse
    {
        PollResponse::create($request->validated());

        return to_route('results')->with('voted', true);
    }

    /**
     * Show the vote counts for every answer.
     */
    public function results(): View
    {
        $results = collect(PollResponse::QUESTIONS)->map(fn (array $question, string $column) => [
            ...$question,
            'counts' => PollResponse::query()->toBase()->selectRaw('count(*) as total')
                ->addSelect($column)->groupBy($column)->pluck('total', $column),
        ]);

        return view('results', [
            'results' => $results,
            'totalResponses' => PollResponse::query()->count(),
        ]);
    }
}
