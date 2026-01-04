<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->index(['company_id', 'department_id'], 'idx_employees_company_department');
            $table->index('employee_code', 'idx_employees_employee_code');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('name', 'idx_users_name');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->index('name', 'idx_departments_name');
        });

        Schema::table('job_roles', function (Blueprint $table) {
            $table->index('name', 'idx_job_roles_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropIndex('idx_employees_company_department');
            $table->dropIndex('idx_employees_employee_code');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('idx_users_name');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->dropIndex('idx_departments_name');
        });

        Schema::table('job_roles', function (Blueprint $table) {
            $table->dropIndex('idx_job_roles_name');
        });
    }
};
