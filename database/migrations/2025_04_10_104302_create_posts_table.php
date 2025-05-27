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
            $table->string('route_prefix')->nullable();
            $table->boolean('is_category')->nullable()->default(0);
            $table->string('title');
            $table->string('slug');
            $table->mediumText('intro')->nullable();
            $table->mediumText('headline')->nullable();
            $table->longText('body')->nullable();
            $table->string('image_path')->nullable();
            $table->json('extras')->nullable();
            $table->string('layout')->nullable();
            $table->integer('position')->nullable()->default(0);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
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
