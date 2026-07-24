<?php

use App\Models\Course;
use App\Models\Language;
use App\Models\User;

it('renders the edit course page with the course language available', function () {
    $user = User::factory()->admin()->create();
    $language = Language::factory()->create();
    $course = Course::factory()->create(['language_id' => $language->id]);

    $this->actingAs($user)
        ->get(route('web.courses.edit', $course))
        ->assertOk()
        ->assertSee('Edit Course')
        ->assertSee('Update');
});
