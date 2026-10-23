<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 150);
            $table->decimal('money', 20, 2)->nullable(); // safer precision
            $table->enum('symbol', ['$', '៛'])->nullable();
            $table->string('location', 255)->nullable();
            $table->string('action', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
