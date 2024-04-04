<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_events', function (Blueprint $table) {
            $table->id();
            $table->integer('max_guests')->nullable();
            $table->integer('min_guests')->nullable();
            $table->json('rooms')->nullable();
            $table->json('caterers')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_events');
    }
};
