<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class CourseController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(?Language $language = null) {
        $courses = $language ? $language->courses() : Course::query();
        return CourseResource::collection($courses->with('language')->paginate());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request) {
        $course = Course::create($request->validated());
        return CourseResource::make($course)->response()->setStatusCode(Response::HTTP_CREATED);
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course) {
        return CourseResource::make($course->load('language'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course) {
        $course->update($request->validated());
        return CourseResource::make($course);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course) {
        $this->authorize('delete', $course);
        $course->forceDelete();
        return response()->noContent();
    }
}
