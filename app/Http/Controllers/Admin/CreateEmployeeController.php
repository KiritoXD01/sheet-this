<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

final class CreateEmployeeController extends Controller
{
    public function __invoke()
    {
        return view('admin.employees.create');
    }
}
