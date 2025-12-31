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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->string('profile_picture')->nullable();
            $table->string('employee_code')->unique()->nullable();
            $table->foreignId('job_role_id')->nullable()->references('id')->on('job_roles');
            $table->foreignId('department_id')->nullable()->references('id')->on('departments');

            $table->unique(['user_id', 'company_id']); // Ensure each user can only be in one company
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
