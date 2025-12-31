<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
    ->use(RefreshDatabase::class)
    ->in('Feature', 'Browser', 'Unit');

/*
|--------------------------------------------------------------------------
| Browser Tests
|--------------------------------------------------------------------------
|
| Configure browser tests to run on Chrome, Firefox, and Safari for comprehensive
| cross-browser testing coverage. This configuration will be used in browser tests.
|
*/

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

expect()->extend('toBeValidEmail', function () {
    return $this->toMatch('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/');
});

expect()->extend('toBeValidTimezone', function () {
    $timezones = DateTimeZone::listIdentifiers();

    return $this->toBeIn($timezones);
});

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
|
| Global helper functions to simplify test setup and reduce code duplication.
|
*/

function createAdminWithCompany(): array
{
    $admin = App\Models\User::factory()->create([
        'role' => App\Enums\UserRoleEnum::ADMIN,
        'password' => 'password',
    ]);

    $company = App\Models\Company::factory()->create([
        'owner_id' => $admin->id,
    ]);

    App\Models\CompanyPolicy::factory()->create([
        'company_id' => $company->id,
    ]);

    return compact('admin', 'company');
}

function createEmployeeUser(): array
{
    $user = App\Models\User::factory()->create([
        'role' => App\Enums\UserRoleEnum::EMPLOYEE,
        'password' => 'password',
    ]);

    $company = App\Models\Company::factory()->create();

    $employee = App\Models\Employee::factory()->create([
        'user_id' => $user->id,
        'company_id' => $company->id,
    ]);

    return compact('user', 'company', 'employee');
}

function createDepartmentForCompany(App\Models\Company $company, ?string $name = null): App\Models\Department
{
    return App\Models\Department::factory()->create([
        'company_id' => $company->id,
        'name' => $name ?? fake()->company(),
    ]);
}

function createJobRoleForCompany(App\Models\Company $company, ?string $name = null): App\Models\JobRole
{
    return App\Models\JobRole::factory()->create([
        'company_id' => $company->id,
        'name' => $name ?? fake()->jobTitle(),
    ]);
}

/*
|--------------------------------------------------------------------------
| Shared Datasets
|--------------------------------------------------------------------------
|
| Define common datasets used across multiple tests to reduce duplication.
|
*/

dataset('user_roles', [
    App\Enums\UserRoleEnum::ADMIN,
    App\Enums\UserRoleEnum::EMPLOYEE,
]);

dataset('industries', [
    App\Enums\IndustryEnum::TECHNOLOGY,
    App\Enums\IndustryEnum::FINANCE,
    App\Enums\IndustryEnum::HEALTHCARE,
    App\Enums\IndustryEnum::RETAIL,
    App\Enums\IndustryEnum::OTHER,
]);

dataset('work_week_days', [
    App\Enums\WorkWeekDaysEnum::MONDAY,
    App\Enums\WorkWeekDaysEnum::TUESDAY,
    App\Enums\WorkWeekDaysEnum::WEDNESDAY,
    App\Enums\WorkWeekDaysEnum::THURSDAY,
    App\Enums\WorkWeekDaysEnum::FRIDAY,
    App\Enums\WorkWeekDaysEnum::SATURDAY,
    App\Enums\WorkWeekDaysEnum::SUNDAY,
]);

dataset('invalid_emails', [
    'plaintext',
    '@example.com',
    'user@',
    'user @example.com',
    'user@.com',
]);

dataset('valid_timezones', [
    'UTC',
    'America/New_York',
    'America/Los_Angeles',
    'Europe/London',
    'Asia/Tokyo',
]);
