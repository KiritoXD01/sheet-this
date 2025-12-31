<?php

declare(strict_types=1);

namespace App\Enums;

enum PosthogEventEnum: string
{
    // Employee events
    case OPENED_EMPLOYEE_DASHBOARD = 'opened_employee_dashboard';
    case OPENED_EMPLOYEE_TIMESHEET = 'opened_employee_timesheet';
    case OPENED_EMPLOYEE_REPORTS = 'opened_employee_reports';

    // Admin events
    case OPENED_ADMIN_DASHBOARD = 'opened_admin_dashboard';
    case OPENED_ADMIN_COMPANY = 'opened_admin_company';
    case OPENED_ADMIN_EMPLOYEES = 'opened_admin_employees';
    case OPENED_ADMIN_CREATE_EMPLOYEE = 'opened_admin_create_employee';
    case OPENED_ADMIN_ONBOARDING = 'opened_admin_onboarding';
}
