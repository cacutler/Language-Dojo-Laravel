<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserExampleRequest;
use App\Http\Requests\UpdateUserExampleRequest;
use App\Http\Resources\UserExampleResource;
use App\Models\GrammarRule;
use App\Models\UserExample;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserExampleController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userExamples = $request->user()->userExamples()->with('grammarRule');

        return UserExampleResource::collection($userExamples->paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('create', UserExample::class);

        return view('user-examples.create', [
            'grammarRules' => GrammarRule::query()->orderBy('title', 'asc')->get(),
            'selectedGrammarRuleId' => $request->query('grammar_rule_id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserExampleRequest $request)
    {
        $userExample = $request->user()->userExamples()->create($request->validated());
        if ($request->expectsJson()) {
            return UserExampleResource::make($userExample)->response()->setStatusCode(Response::HTTP_CREATED);
        }

        return redirect()->route('web.user-examples.edit', $userExample)->with('status', 'Example created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserExample $userExample)
    {
        $this->authorize('view', $userExample);

        return UserExampleResource::make($userExample->load('grammarRule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserExample $userExample)
    {
        $this->authorize('update', $userExample);

        return view('user-examples.edit', ['userExample' => $userExample->load('grammarRule')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserExampleRequest $request, UserExample $userExample)
    {
        $userExample->update($request->validated());
        if ($request->expectsJson()) {
            return UserExampleResource::make($userExample);
        }

        return redirect()->route('web.user-examples.edit', $userExample)->with('status', 'Example updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserExample $userExample)
    {
        $this->authorize('delete', $userExample);
        $userExample->forceDelete();

        return response()->noContent();
    }
}
