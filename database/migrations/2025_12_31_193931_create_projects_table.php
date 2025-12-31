<?php

declare(strict_types=1);

use App\Enums\ProjectStatusEnum;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->string('name');
            $table->string('client_name');
            $table->text('description')->nullable();
            $table->string('status', 10)->default(ProjectStatusEnum::PLANNING->value);
            $table->date('due_date')->nullable();
            $table->timestamps();

            $table->unique(['company_id', 'name']);
            $table->unique(['name', 'client_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
