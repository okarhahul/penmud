<?php

// Mingrasi Databases Jurnalistik ke Website

use Illuminate\Database\DBAL\TimestampType;
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
        Schema::create('jurnalistiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_jurnalistik_id');
            $table->foreignId('user_id');
            $table->foreignId('komentar_jurnalistik_id')->nullable();
            $table->string('judul');
            $table->text('penulis')->nullable();
            $table->text('editor')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('headline');
            $table->text('body');
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
        Schema::dropIfExists('jurnalistiks');
    }
};
