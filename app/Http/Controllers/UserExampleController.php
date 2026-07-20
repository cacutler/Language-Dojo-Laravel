<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserExampleRequest;
use App\Http\Requests\UpdateUserExampleRequest;
use App\Http\Resources\UserExampleResource;
use App\Models\UserExample;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class UserExampleController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $userExamples = $request->user()->userExamples()->with('grammarRule');
        return UserExampleResource::collection($userExamples->paginate());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserExampleRequest $request) {
        $userExample = $request->user()->userExamples()->create($request->validated());
        return UserExampleResource::make($userExample)->response()->setStatusCode(Response::HTTP_CREATED);
    }
    /**
     * Display the specified resource.
     */
    public function show(UserExample $userExample) {
        $this->authorize('view', $userExample);
        return UserExampleResource::make($userExample->load('grammarRule'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserExampleRequest $request, UserExample $userExample) {
        $userExample->update($request->validated());
        return UserExampleResource::make($userExample);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserExample $userExample) {
        $this->authorize('delete', $userExample);
        $userExample->forceDelete();
        return response()->noContent();
    }
}
