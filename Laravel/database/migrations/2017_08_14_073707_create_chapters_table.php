<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('chapter_num');
          $table->string('prev_decision');
          $table->text('description');
          $table->integer('decision_a_id');
          $table->string('decision_a_text');
          $table->integer('decision_b_id');
          $table->string('decision_b_text');
          $table->integer('decision_c_id');
          $table->string('decision_c_text');
          $table->integer('book_id');
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
        Schema::dropIfExists('chapters');
    }
}
