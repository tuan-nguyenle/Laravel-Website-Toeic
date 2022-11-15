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
        Schema::create('tbl_question', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number_for_exam');
            $table->string('paragraph', 255)->nullable();
            $table->string('option_1', 255);
            $table->string('option_2', 255);
            $table->string('option_3', 255);
            $table->string('option_4', 255)->nullable();
            $table->string('correct_answer', 255);
            $table->string('image', 255)->nullable();
            $table->string('audio', 255)->nullable();
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('tbl_exam');
            $table->timestamp('create_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
};
