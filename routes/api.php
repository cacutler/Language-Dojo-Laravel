<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GrammarRuleController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProgressTrackingController;
use App\Http\Controllers\SystemExampleController;
use App\Http\Controllers\UserExampleController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum')->name('user');
Route::prefix('v1')->name('api.')->group(function () {
    Route::apiResource('languages', LanguageController::class);
    Route::apiResource('languages.courses', CourseController::class)->only(['index', 'store']);
    Route::apiResource('courses', CourseController::class)->except(['index', 'store']);
    Route::apiResource('courses.grammar-rules', GrammarRuleController::class)->only(['index', 'store']);
    Route::apiResource('grammar-rules', GrammarRuleController::class)->except(['index', 'store']);
    Route::apiResource('grammar-rules.system-examples', SystemExampleController::class)->only(['index', 'store']);
    Route::apiResource('system-examples', SystemExampleController::class)->except(['index', 'store']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('user-examples', UserExampleController::class);
        Route::apiResource('progress-tracking', ProgressTrackingController::class);
    });
});
