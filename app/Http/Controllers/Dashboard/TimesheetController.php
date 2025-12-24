<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

final class TimesheetController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.timesheet');
    }
}
