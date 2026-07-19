<?php
namespace Database\Seeders;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
class CourseUserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::all()->each(function (User $user) {
            Course::inRandomOrder(null)->limit(random_int(1, 3))->get()->each(function (Course $course) use ($user) {
                $user->courses()->attach($course->id, [
                    'id' => \Illuminate\Support\Str::uuid(),
                    'current_status' => fake()->randomElement(['enrolled', 'completed']),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            });
        });
    }
}
