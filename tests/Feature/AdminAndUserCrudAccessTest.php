<?php
use App\Models\GrammarRule;
use App\Models\User;
use App\Models\UserExample;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);
it('allows an admin to access the language admin index page', function () {
    $admin = User::factory()->admin()->create();
    $this->actingAs($admin)->get(route('web.languages.index'))->assertOk();
});
it('prevents a regular user from creating a language', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('web.languages.create'))->assertForbidden();
});
it('allows a regular user to manage their own user examples in the web UI', function () {
    $user = User::factory()->create();
    $grammarRule = GrammarRule::factory()->create();
    $userExample = UserExample::factory()->for($user)->for($grammarRule, 'grammarRule')->create();
    $this->actingAs($user)->get(route('web.user-examples.index'))->assertOk();
    $this->actingAs($user)->get(route('web.user-examples.create'))->assertOk();
    $this->actingAs($user)->get(route('web.user-examples.edit', $userExample))->assertOk();
});
