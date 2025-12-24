<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class CompanyController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.company.index');
    }
}
