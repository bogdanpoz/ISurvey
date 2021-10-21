<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('uuid');
            $table->string('title');
            $table->string('goodbye_text');
            $table->boolean('require_password')->default(0);
            $table->string('password')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('max_results')->nullable();
            $table->string('logo')->nullable();
            $table->string('font_style')->nullable();
            $table->string('color')->nullable();
            $table->boolean('visibility')->default(1);
            $table->boolean('annomous')->default(0);
            $table->boolean('collect_feedback')->default(1);
            $table->integer('responses_count');
            $table->integer('questions_count');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('surveys');
    }
}
