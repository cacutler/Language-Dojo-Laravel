<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CourseController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ?Language $language = null) {
        $courses = $language ? $language->courses() : Course::query();
        if ($request->expectsJson()) {
            return CourseResource::collection($courses->with('language')->paginate());
        }
        return view('courses.index', [
            'language' => $language,
            'courses' => $courses->with('language')->paginate()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Language $language) {
        $this->authorize('create', Course::class);
        return view('courses.create', ['language' => $language]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request) {
        $course = Course::create($request->validated());
        if ($request->expectsJson()) {
            return CourseResource::make($course)->response()->setStatusCode(Response::HTTP_CREATED);
        }
        return redirect()->route('web.courses.index', $course)->with('status', 'Course created.');
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
    public function edit(Course $course) {
        $this->authorize('update', $course);
        return view('courses.edit', ['course' => $course->load('language')]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course) {
        $course->update($request->validated());
        if ($request->expectsJson()) {
            return CourseResource::make($course);
        }
        return redirect()->route('web.courses.index', $course)->with('status', 'Course updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Course $course) {
        $this->authorize('delete', $course);
        $course->forceDelete();
        if ($request->expectsJson()) {
            return response()->noContent();
        }
        return redirect()->route('web.courses.index')->with('status', 'Course deleted.');
    }
}
