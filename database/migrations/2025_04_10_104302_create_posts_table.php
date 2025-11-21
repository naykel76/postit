<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('intro')->nullable();
            $table->mediumText('headline')->nullable();
            $table->longText('content')->nullable();
            $table->string('image_path')->nullable();
            $table->string('route_prefix')->nullable();
            $table->boolean('is_category')->nullable()->default(false);
            $table->json('extras')->nullable();
            $table->string('layout')->nullable();
            $table->integer('position')->nullable()->default(0);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
