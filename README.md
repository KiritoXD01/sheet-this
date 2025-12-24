# Sheet This

A modern employee time tracking and attendance management system built with Laravel 12 and Livewire 3.

## About Sheet This

Sheet This is a comprehensive timesheet and workforce management application designed to simplify employee time tracking, attendance monitoring, and leave request management. Built with modern web technologies, it provides both employee and admin interfaces for seamless workforce management.

## Features

### Employee Dashboard
- **Time Tracking**: Clock in/out functionality with location verification
- **Weekly Overview**: Track hours worked against targets with visual progress indicators
- **Leave Requests**: Submit and manage vacation, sick leave, and personal time off requests
- **Request History**: View status of all time-off requests (pending, approved, denied)
- **Work Streaks**: Monitor consecutive days worked and attendance patterns

### Admin Dashboard
- **Live Attendance**: Real-time view of employee clock-in/out status
- **Employee Management**: Manage workforce including creating and viewing employee records
- **Company Management**: Configure company settings and information
- **Request Approvals**: Review and approve/deny employee leave requests
- **Attendance Analytics**: Track late arrivals, absences, and overall workforce activity
- **Location Verification**: Monitor employee locations for remote and in-office work

## Tech Stack

- **Framework**: Laravel 12 (PHP 8.4+)
- **Frontend**: Livewire 3 for reactive components
- **UI Components**: WireUI 2.5 for pre-built components
- **Styling**: Tailwind CSS 4 with custom design system
- **Database**: PostgreSQL (configurable)
- **Testing**: Pest 4 for unit and feature tests
- **Development Tools**: Laravel Sail, Pint, Pail, and Boost

## Getting Started

### Prerequisites

- PHP 8.4 or higher
- Composer
- Bun (for frontend assets)
- Postgres

### Installation

1. Clone the repository
2. Run the setup script:

```bash
composer run setup
```

This will:
- Install PHP dependencies
- Copy the environment file
- Generate application key
- Run database migrations
- Install and build frontend assets

### Development

Start the development server with all services:

```bash
composer run dev
```

This runs:
- Laravel development server
- Queue worker
- Log viewer (Pail)
- Vite dev server

Alternatively, run services individually:

```bash
php artisan serve
bun run dev
```

### Testing

Run the test suite:

```bash
composer test
```

### Code Style

Format code with Laravel Pint:

```bash
composer run pint
```

## User Roles

The application supports two user roles:

- **Employee**: Access to personal dashboard, timesheet, and reports
- **Admin**: Full access including employee management and approvals

## Routes

### Authentication
- `/login` - User login

### Employee Routes (requires authentication)
- `/dashboard` - Employee dashboard
- `/dashboard/timesheet` - Timesheet management
- `/dashboard/reports` - Personal reports

### Admin Routes (requires admin role)
- `/admin` - Admin overview
- `/admin/employees` - Employee listing
- `/admin/employees/create` - Create new employee
- `/admin/company` - Company settings

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
