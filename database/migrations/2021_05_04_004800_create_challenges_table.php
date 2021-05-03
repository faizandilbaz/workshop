<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_shop_id');
            $table->foreign('work_shop_id')->references('id')->on('work_shops')->onDelete('cascade');
            $table->string('result')->nullable();
            $table->string('status')->default('Pending');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('challenger_id');
            $table->foreign('challenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('work_shop_employee_id');
            $table->foreign('work_shop_employee_id')->references('id')->on('workshop_employees')->onDelete('cascade');
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
        Schema::dropIfExists('challenges');
    }
}
