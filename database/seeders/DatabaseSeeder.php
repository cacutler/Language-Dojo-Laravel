<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([
            LanguageSeeder::class,
            CourseSeeder::class,
            GrammarRuleSeeder::class,
            SystemExampleSeeder::class,
            UserSeeder::class,
            CourseUserSeeder::class,
            ProgressTrackingSeeder::class,
            UserExampleSeeder::class,
        ]);
    }
}
