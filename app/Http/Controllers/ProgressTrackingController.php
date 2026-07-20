<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressTrackingRequest;
use App\Http\Requests\UpdateProgressTrackingRequest;
use App\Http\Resources\ProgressTrackingResource;
use App\Models\ProgressTracking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ProgressTrackingController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $progressTracking = $request->user()->progressTracking()->with('grammarRule');
        return ProgressTrackingResource::collection($progressTracking->paginate());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgressTrackingRequest $request) {
        $progressTracking = $request->user()->progressTracking()->updateOrCreate(['grammar_rule_id' => $request->validated('grammar_rule_id')], ['is_completed' => $request->boolean('is_completed', true)]);
        return ProgressTrackingResource::make($progressTracking)->response()->setStatusCode(Response::HTTP_CREATED);
    }
    /**
     * Display the specified resource.
     */
    public function show(ProgressTracking $progressTracking) {
        $this->authorize('view', $progressTracking);
        return ProgressTrackingResource::make($progressTracking->load('grammarRule'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgressTrackingRequest $request, ProgressTracking $progressTracking) {
        $progressTracking->update($request->validated());
        return ProgressTrackingResource::make($progressTracking);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressTracking $progressTracking) {
        $this->authorize('delete', $progressTracking);
        $progressTracking->forceDelete();
        return response()->noContent();
    }
}
