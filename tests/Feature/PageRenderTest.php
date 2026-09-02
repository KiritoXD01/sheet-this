<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

it('renders the login page for guests', function () {
    $this->get(route('login.index'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Auth/Login'));
});

it('redirects guests away from dashboard pages', function (string $routeName) {
    $this->get(route($routeName))->assertRedirect('/login');
})->with(['dashboard.index', 'dashboard.projects', 'dashboard.timesheet']);

it('renders the dashboard with a narrowed auth user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('dashboard.index'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Dashboard')
            ->has('auth.user', fn (Assert $page) => $page
                ->where('id', $user->id)
                ->where('name', $user->name)
                ->where('email', $user->email)
                ->missing('password')
                ->missing('remember_token')));
});

it('renders the projects page with only the user\'s projects', function () {
    $user = User::factory()->create();
    $other = User::factory()->create();
    $own = Project::factory()->for($user, 'user')->create(['name' => 'Mine', 'color' => '#7C3AED']);
    Project::factory()->for($other, 'user')->create(['name' => 'Theirs']);

    $this->actingAs($user)
        ->get(route('dashboard.projects'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Projects')
            ->has('projects', 1, fn (Assert $page) => $page
                ->where('id', $own->id)
                ->where('name', 'Mine')
                ->where('color', '#7C3AED')));
});

it('renders the timesheet page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('dashboard.timesheet'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Timesheet'));
});
