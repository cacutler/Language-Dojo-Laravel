<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class LanguageController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return LanguageResource::collection(Language::query()->paginate(15));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $this->authorize('create', Language::class);
        return view('languages.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request) {
        $language = Language::create($request->validated());
        if ($request->expectsJson()) {
            return LanguageResource::make($language)->response()->setStatusCode(Response::HTTP_CREATED);
        }
        return redirect()->route('web.languages.edit', $language)->with('status', 'Language created.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Language $language) {
        return LanguageResource::make($language);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language) {
        $this->authorize('update', $language);
        return view('languages.edit', ['language' => $language]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language) {
        $language->update($request->validated());
        if ($request->expectsJson()) {
            return LanguageResource::make($language);
        }
        return redirect()->route('web.languages.edit', $language)->with('status', 'Language updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language) {
        $this->authorize('delete', $language);
        $language->forceDelete();
        return response()->noContent();
    }
}
