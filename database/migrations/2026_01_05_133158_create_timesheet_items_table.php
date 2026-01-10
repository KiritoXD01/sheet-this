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
        Schema::create('timesheet_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timesheet_id')->references('id')->on('timesheets');
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->date('item_date');
            $table->text('description')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_billable')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheet_items');
    }
};
