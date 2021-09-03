<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagies', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->string('file')->nullable();
            $table->foreignId('chat_id');
            $table->foreignId('user_id');
            $table->foreign('chat_id')->references('id')->on("chats");
            $table->foreign('user_id')->references('id')->on("users");
            $table->softDeletes();
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
        Schema::dropIfExists('messagies');
    }
}
