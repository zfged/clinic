<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_question', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->string('options');
            $table->string('answer');
            $table->boolean('isScanQr')->default(0);
            $table->boolean('isReplied')->default(0);
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
        Schema::dropIfExists('qr_question');
    }
}
