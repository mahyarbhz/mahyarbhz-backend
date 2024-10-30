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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->enum('locale', ['fa', 'en']);
            $table->enum('status', ['waiting', 'published', 'removed']);
            $table->text('summary');
            $table->text('content');

            $table->unsignedBigInteger('public_category_id');
            $table->foreign('public_category_id')
                  ->references('id')
                  ->on('public_categories')
                  ->onDelete('cascade');

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
