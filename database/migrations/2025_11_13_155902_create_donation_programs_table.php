<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donation_programs', function (Blueprint $table) {
            $table->uuid('program_id')->primary()->default(Str::uuid());
            $table->string('banner');
            $table->string('title');
            $table->text('description');
            $table->date('deadline');
            $table->integer('target');
            $table->string('slug');
            $table->enum('status', ['AKTIF', 'NONAKTIF'])->default('AKTIF');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_programs');
    }
};
