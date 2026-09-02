<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

it('redirects guests who try to create a project', function () {
    $this->post(route('projects.store'), ['name' => 'Acme', 'color' => '#7C3AED'])
        ->assertRedirect('/login');
});

it('creates a project for the authenticated user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('dashboard.projects'))
        ->post(route('projects.store'), ['name' => 'Acme Corp Website', 'color' => '#7c3aed'])
        ->assertRedirect(route('dashboard.projects'));

    $project = Project::where('user_id', $user->id)->first();

    expect($project)->not->toBeNull();
    expect($project->name)->toBe('Acme Corp Website');
    expect($project->color)->toBe('#7C3AED');
});

it('rejects an invalid color', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('projects.store'), ['name' => 'Acme', 'color' => 'purple'])
        ->assertSessionHasErrors('color');

    expect(Project::count())->toBe(0);
});

it('rejects a duplicate project name for the same user', function () {
    $user = User::factory()->create();
    Project::factory()->for($user, 'user')->create(['name' => 'Acme']);

    $this->actingAs($user)
        ->post(route('projects.store'), ['name' => 'Acme', 'color' => '#7C3AED'])
        ->assertSessionHasErrors('name');

    expect(Project::count())->toBe(1);
});

it('updates the owner\'s project', function () {
    $user = User::factory()->create();
    $project = Project::factory()->for($user, 'user')->create(['name' => 'Old', 'color' => '#2563EB']);

    $this->actingAs($user)
        ->from(route('dashboard.projects'))
        ->put(route('projects.update', $project), ['name' => 'New Name', 'color' => '#059669'])
        ->assertRedirect(route('dashboard.projects'));

    $project->refresh();

    expect($project->name)->toBe('New Name');
    expect($project->color)->toBe('#059669');
});

it('forbids updating another user\'s project', function () {
    $owner = User::factory()->create();
    $intruder = User::factory()->create();
    $project = Project::factory()->for($owner, 'user')->create(['name' => 'Private']);

    $this->actingAs($intruder)
        ->put(route('projects.update', $project), ['name' => 'Hijacked', 'color' => '#DC2626'])
        ->assertForbidden();

    expect($project->fresh()->name)->toBe('Private');
});
