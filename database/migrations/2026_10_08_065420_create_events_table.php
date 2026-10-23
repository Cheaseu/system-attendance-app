<?php

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
        // ប្រើ Schema::create ដើម្បីបង្កើត Table ថ្មី
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();        // ឈ្មោះកម្មវិធី
            $table->string('host_name')->nullable();   // ឈ្មោះម្ចាស់ដើមកម្មវិធី (ឧ. លោក ហេង)
            $table->integer('guest_count')->default(0); // ចំនួនភ្ញៀវចូលរួម
            $table->decimal('total_amount', 10, 2)->default(0); // ថវិការកបានសរុប
            $table->tinyInteger('status')->default(1); // ស្ថានភាព 1=Active, 0=Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};