<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemExampleRequest;
use App\Http\Requests\UpdateSystemExampleRequest;
use App\Http\Resources\SystemExampleResource;
use App\Models\GrammarRule;
use App\Models\SystemExample;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class SystemExampleController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ?GrammarRule $grammarRule = null) {
        $systemExamples = $grammarRule ? $grammarRule->systemExamples() : SystemExample::query();
        if ($request->expectsJson()) {
            return SystemExampleResource::collection($systemExamples->paginate());
        }
        return view('system-examples.index', [
            'grammarRule' => $grammarRule,
            'systemExamples' => $systemExamples->with('grammarRule')->paginate()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(GrammarRule $grammarRule) {
        $this->authorize('create', SystemExample::class);
        return view('system-examples.create', ['grammarRule' => $grammarRule]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSystemExampleRequest $request) {
        $systemExample = SystemExample::create($request->validated());
        if ($request->expectsJson()) {
            return SystemExampleResource::make($systemExample)->response()->setStatusCode(Response::HTTP_CREATED);
        }
        return redirect()->route('web.system-examples.edit', $systemExample)->with('status', 'Example created.');
    }
    /**
     * Display the specified resource.
     */
    public function show(SystemExample $systemExample) {
        return SystemExampleResource::make($systemExample);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SystemExample $systemExample) {
        $this->authorize('update', $systemExample);
        return view('system-examples.edit', ['systemExample' => $systemExample->load('grammarRule')]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSystemExampleRequest $request, SystemExample $systemExample) {
        $systemExample->update($request->validated());
        if ($request->expectsJson()) {
            return SystemExampleResource::make($systemExample);
        }
        return redirect()->route('web.system-examples.edit', $systemExample)->with('status', 'Example updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SystemExample $systemExample) {
        $this->authorize('delete', $systemExample);
        $systemExample->forceDelete();
        if ($request->expectsJson()) {
            return response()->noContent();
        }
        return redirect()->route('web.system-examples.index')->with('status', 'Example deleted.');
    }
}
