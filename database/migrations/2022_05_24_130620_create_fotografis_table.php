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
        Schema::create('fotografis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('judul')->nullable();
            $table->string('pemilik')->nullable();
            $table->foreignId('komentar_fotografi_id')->nullable();
            $table->string('image')->nullable();
            $table->text('headline')->nullable();
            $table->string('slug')->unique();
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('fotografis');
    }
};
