<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GrammarRuleController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProgressTrackingController;
use App\Http\Controllers\SystemExampleController;
use App\Http\Controllers\UserExampleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
Route::get('/', function () {
    return view('index');
})->name('index');
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
Route::middleware('auth')->name('web.')->group(function () {
    Route::resource('languages', LanguageController::class)->only(['create', 'store', 'edit', 'update']);
    Route::resource('languages.courses', CourseController::class)->only(['create', 'store']);
    Route::resource('courses', CourseController::class)->only(['edit', 'update']);
    Route::resource('courses.grammar-rules', GrammarRuleController::class)->only(['create', 'store']);
    Route::resource('grammar-rules', GrammarRuleController::class)->only(['edit', 'update']);
    Route::resource('grammar-rules.system-examples', SystemExampleController::class)->only(['create', 'store']);
    Route::resource('system-examples', SystemExampleController::class)->only(['edit', 'update']);
    Route::resource('user-examples', UserExampleController::class)->only(['create', 'store', 'edit', 'update']);
    Route::resource('progress-tracking', ProgressTrackingController::class)->only(['create', 'store', 'edit', 'update']);
});
