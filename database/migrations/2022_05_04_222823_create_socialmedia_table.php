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
        Schema::create('socialmedia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aid');
            $table->string('uprofile')->nullable();
            $table->integer('parentcomment')->nullable();
            $table->longText('replyreplycomment')->nullable();
            $table->longText('replyreplydes')->nullable();
            $table->integer('replyreplyowner')->nullable();
            $table->longText('Description');
            $table->longText('images')->nullable();
            $table->timestamps();

            $table->foreign('aid')->references('id')->on('')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialmedia');
    }
};
