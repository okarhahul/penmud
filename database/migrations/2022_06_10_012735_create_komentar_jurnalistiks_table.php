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
        Schema::create('komentar_jurnalistiks', function (Blueprint $table) {
            $table->id();
            $table->text('konten');
            // $table->foreignId('jurnalistik_id');
            $table->foreignId('post_jurnalistik_id')->constrained('jurnalistiks');
            $table->foreignId('user_id');
            $table->integer('parent');
            // $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('komentar_jurnalistiks');
    }
};