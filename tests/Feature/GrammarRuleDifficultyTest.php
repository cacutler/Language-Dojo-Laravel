<?php

use App\Models\Course;
use App\Models\User;

it('allows creating a grammar rule with beginner difficulty', function () {
    $user = User::factory()->admin()->create();
    $course = Course::factory()->create();

    $this->actingAs($user)
        ->withSession(['_token' => 'test'])
        ->post(route('web.courses.grammar-rules.store', $course), [
            'course_id' => $course->id,
            'title' => 'Present tense',
            'explanation' => 'Use this for present actions.',
            'difficulty_level' => 'beginner',
            '_token' => 'test',
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('grammar_rules', [
        'course_id' => $course->id,
        'title' => 'Present tense',
        'difficulty_level' => 'beginner',
    ]);
});
