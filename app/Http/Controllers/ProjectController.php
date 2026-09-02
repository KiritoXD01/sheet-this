<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

final class ProjectController extends Controller
{
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $request->user()->projects()->create([
            'name' => $data['name'],
            'color' => mb_strtoupper($data['color']),
        ]);

        return back()->with('message', 'Project created.');
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->validated();

        $project->update([
            'name' => $data['name'],
            'color' => mb_strtoupper($data['color']),
        ]);

        return back()->with('message', 'Project updated.');
    }
}
