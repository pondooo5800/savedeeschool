<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('title');
            $table->longText('description');
            $table->integer('number_qns');
            $table->boolean('review_qns')->default(0);
            $table->boolean('show_answer')->default(0);
            $table->boolean('show_pagination')->default(0);
            $table->string('duration_lb')->nullable();
            $table->integer('duration')->default(0);
            $table->decimal('passing_grade', 5);
            $table->integer('retake')->default(0);
            $table->boolean('random_qns')->default(0);
            $table->boolean('allow_rate')->default(1);
            $table->string('qns_list')->nullable();
            $table->dateTime('available_on')->nullable();
            $table->string('status')->default('Draft');
            $table->string('access_code')->nullable();
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
        Schema::dropIfExists('quizzes');
    }
}