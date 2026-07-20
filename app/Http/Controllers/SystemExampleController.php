<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemExampleRequest;
use App\Http\Requests\UpdateSystemExampleRequest;
use App\Http\Resources\SystemExampleResource;
use App\Models\GrammarRule;
use App\Models\SystemExample;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class SystemExampleController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(?GrammarRule $grammarRule = null) {
        $systemExamples = $grammarRule ? $grammarRule->systemExamples() : SystemExample::query();
        return SystemExampleResource::collection($systemExamples->paginate());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(){}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSystemExampleRequest $request) {
        $systemExample = SystemExample::create($request->validated());
        return SystemExampleResource::make($systemExample)->response()->setStatusCode(Response::HTTP_CREATED);
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
    public function edit(string $id) {}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSystemExampleRequest $request, SystemExample $systemExample) {
        $systemExample->update($request->validated());
        return SystemExampleResource::make($systemExample);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SystemExample $systemExample) {
        $this->authorize('delete', $systemExample);
        $systemExample->forceDelete();
        return response()->noContent();
    }
}
