<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('quiz_id');
            $table->string('status');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->longText('question_answers')->nullable();
            $table->longText('results')->nullable();
            $table->string('current_question');
            $table->string('grade')->nullable();
            $table->string('score')->nullable();
            $table->string('time_taken')->nullable();
            $table->string('total_correct')->nullable();
            $table->longText('review_json')->nullable();
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
        Schema::dropIfExists('user_quizzes');
    }
}
