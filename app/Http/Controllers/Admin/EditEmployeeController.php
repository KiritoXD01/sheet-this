<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;

final class EditEmployeeController extends Controller
{
    public function __invoke(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }
}
