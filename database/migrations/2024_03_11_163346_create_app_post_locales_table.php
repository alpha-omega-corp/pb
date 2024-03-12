<?php

use App\Models\AppPost;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_post_locales', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppPost::class);
            $table->enum('lang', Language::values());
            $table->string('alt');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_post_locales');
    }
};
