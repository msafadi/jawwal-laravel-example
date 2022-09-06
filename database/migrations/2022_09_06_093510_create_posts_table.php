<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create new table in Database
        Schema::create('posts', function (Blueprint $table) {
            // Define new column "id" BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->id();
            // $table->bigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            // Define Foreign key "user_id"
            // on delete: restrict, cascade, set null
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            // Define new column "body" LONGTEXT
            $table->longText('body');

            $table->enum('status', ['published', 'draft'])->default('published');
            $table->enum('visibility', ['public', 'friends', 'me'])->default('public');

            // Define 2 columns:
            // created_at TIMESTAMP NULL
            // updated_at TIMESTAMP NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
