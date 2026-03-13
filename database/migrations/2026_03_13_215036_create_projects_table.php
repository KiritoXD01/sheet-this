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
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('status')->default(ProjectStatusEnum::ACTIVE->value);
            $table->timestamps();

            $table->unique(['user_id', 'name']);
        });
    }
};
