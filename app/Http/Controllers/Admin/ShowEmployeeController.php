<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;

final class ShowEmployeeController extends Controller
{
    public function __invoke(Employee $employee)
    {
        $employee->load('company', 'user', 'department', 'jobRole');

        return view('admin.employees.show', compact('employee'));
    }
}
