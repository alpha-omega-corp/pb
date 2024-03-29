<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('category_locales', function (Blueprint $table) {
            $table->id();
            $table->morphs('categorizable');
            $table->string('lang');
            $table->string('slug');
            $table->string('title');
            $table->string('description');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_locales');
    }
};
