<?php

declare(strict_types=1);

use App\Enums\ProjectStatusEnum;
use App\Models\Project;
use App\Models\User;

it('belongs to a user', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['user_id' => $user->id]);

    expect($project->user)->toBeInstanceOf(User::class);
    expect($project->user->id)->toBe($user->id);
});

it('casts status to enum', function () {
    $user = User::factory()->create();
    $project = Project::factory()->for($user, 'user')->create(['status' => ProjectStatusEnum::ACTIVE]);

    expect($project->status)->toBeInstanceOf(ProjectStatusEnum::class);
    expect($project->status)->toBe(ProjectStatusEnum::ACTIVE);
});

it('has fillable attributes', function () {
    $user = User::factory()->create();

    $project = Project::create([
        'user_id' => $user->id,
        'name' => 'Test Project',
        'status' => ProjectStatusEnum::ACTIVE,
        'color' => '#ff0000',
    ]);

    expect($project->name)->toBe('Test Project');
    expect($project->color)->toBe('#ff0000');
});
