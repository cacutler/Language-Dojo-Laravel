<?php
namespace Database\Seeders;
use App\Models\Language;
use Illuminate\Database\Seeder;
class LanguageSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        collect([
            ['name' => 'Spanish', 'code' => 'es'],
            ['name' => 'French', 'code' => 'fr'],
            ['name' => 'Japanese', 'code' => 'ja'],
            ['name' => 'German', 'code' => 'de'],
            ['name' => 'Korean', 'code' => 'ko']
        ])->each(fn (array $language) => Language::factory()->create($language));
    }
}
