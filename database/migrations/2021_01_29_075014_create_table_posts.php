<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->unique();
            $table->string('slug', 200)->unique();
            $table->boolean('published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('cover', 255)->nullable();
            $table->text('content')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
    }
}
