<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgressTrackingRequest;
use App\Http\Requests\UpdateProgressTrackingRequest;
use App\Http\Resources\ProgressTrackingResource;
use App\Models\GrammarRule;
use App\Models\ProgressTracking;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgressTrackingController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $progressTracking = $request->user()->progressTracking()->with('grammarRule');

        return ProgressTrackingResource::collection($progressTracking->paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('create', ProgressTracking::class);

        return view('progress-tracking.create', [
            'grammarRules' => GrammarRule::query()->orderBy('title', 'asc')->get(),
            'selectedGrammarRuleId' => $request->query('grammar_rule_id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgressTrackingRequest $request)
    {
        $progressTracking = $request->user()->progressTracking()->updateOrCreate(['grammar_rule_id' => $request->validated('grammar_rule_id')], ['is_completed' => $request->boolean('is_completed', true)]);
        if ($request->expectsJson()) {
            return ProgressTrackingResource::make($progressTracking)->response()->setStatusCode(Response::HTTP_CREATED);
        }

        return redirect()->route('web.progress-tracking.edit', $progressTracking)->with('status', 'Progress saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgressTracking $progressTracking)
    {
        $this->authorize('view', $progressTracking);

        return ProgressTrackingResource::make($progressTracking->load('grammarRule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgressTracking $progressTracking)
    {
        $this->authorize('update', $progressTracking);

        return view('progress-tracking.edit', ['progressTracking' => $progressTracking->load('grammarRule')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgressTrackingRequest $request, ProgressTracking $progressTracking)
    {
        $progressTracking->update($request->validated());
        if ($request->expectsJson()) {
            return ProgressTrackingResource::make($progressTracking);
        }

        return redirect()->route('web.progress-tracking.edit', $progressTracking)->with('status', 'Progress updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressTracking $progressTracking)
    {
        $this->authorize('delete', $progressTracking);
        $progressTracking->forceDelete();

        return response()->noContent();
    }
}
