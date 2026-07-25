<?php

use App\Models\User;

it('allows an authenticated user to open the progress tracking page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('web.progress-tracking.index'))
        ->assertOk();
});
