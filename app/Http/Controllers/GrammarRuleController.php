<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrammarRuleRequest;
use App\Http\Requests\UpdateGrammarRuleRequest;
use App\Http\Resources\GrammarRuleResource;
use App\Models\Course;
use App\Models\GrammarRule;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class GrammarRuleController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(?Course $course = null) {
        $grammarRules = $course ? $course->grammarRules() : GrammarRule::query();
        return GrammarRuleResource::collection($grammarRules->with('course')->paginate());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course) {
        $this->authorize('create', GrammarRule::class);
        return view('grammar-rules.create', ['course' => $course]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrammarRuleRequest $request) {
        $grammarRule = GrammarRule::create($request->validated());
        if ($request->expectsJson()) {
            return GrammarRuleResource::make($grammarRule)->response()->setStatusCode(Response::HTTP_CREATED);
        }
        return redirect()->route('web.grammar-rules.edit', $grammarRule)->with('status', 'Grammar rule created.');
    }
    /**
     * Display the specified resource.
     */
    public function show(GrammarRule $grammarRule) {
        return GrammarRuleResource::make($grammarRule->load('course'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrammarRule $grammarRule) {
        $this->authorize('update', $grammarRule);
        return view('grammar-rules.edit', ['grammarRule' => $grammarRule->load('course')]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrammarRuleRequest $request, GrammarRule $grammarRule) {
        $grammarRule->update($request->validated());
        if ($request->expectsJson()) {
            return GrammarRuleResource::make($grammarRule);
        }
        return redirect()->route('web.grammar-rules.edit', $grammarRule)->with('status', 'Grammar rule updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrammarRule $grammarRule) {
        $this->authorize('delete', $grammarRule);
        $grammarRule->forceDelete();
        return response()->noContent();
    }
}
