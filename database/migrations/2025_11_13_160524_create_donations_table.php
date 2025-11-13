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
        Schema::create('donations', function (Blueprint $table) {
            $table->uuid('donation_id')->primary()->default(Str::uuid());
            $table->string('order_id');
            $table->string('full_name');
            $table->string('honorary_call');
            $table->string('email');
            $table->string('phone_number');
            $table->text('hope');
            $table->string('bank');
            $table->integer('amount');
            $table->enum('status', ['Menunggu', 'Sukses', 'Gagal', 'Kadaluarsa', 'Dibatalkan']);
            $table->foreignUuid('program_id')->constrained('donation_programs', 'program_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
