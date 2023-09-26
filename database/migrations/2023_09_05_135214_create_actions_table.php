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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->enum('name',['Add','Edit','Delete','Login']);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('comment_id')->nullable()->constrained('comments');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('post_id')->nullable()->constrained('posts');
            $table->foreignId('tag_id')->nullable()->constrained('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
