<?php
namespace App\Providers;
use App\Models\Course;
use App\Models\GrammarRule;
use App\Models\Language;
use App\Models\ProgressTracking;
use App\Models\SystemExample;
use App\Models\UserExample;
use App\Policies\CoursePolicy;
use App\Policies\GrammarRulePolicy;
use App\Policies\LanguagePolicy;
use App\Policies\ProgressTrackingPolicy;
use App\Policies\SystemExamplePolicy;
use App\Policies\UserExamplePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Course::class => CoursePolicy::class,
        GrammarRule::class => GrammarRulePolicy::class,
        Language::class => LanguagePolicy::class,
        ProgressTracking::class => ProgressTrackingPolicy::class,
        SystemExample::class => SystemExamplePolicy::class,
        UserExample::class => UserExamplePolicy::class
    ];
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        $this->registerPolicies();
    }
}
