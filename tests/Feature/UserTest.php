<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\User;

it('has many projects', function () {
    $user = User::factory()->create();

    Project::factory()->count(3)->create(['user_id' => $user->id]);

    expect($user->projects)->toHaveCount(3);
});

it('projects belong to user', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);

    expect($project->user)->toBeInstanceOf(User::class);
    expect($project->user->id)->toBe($user->id);
});
