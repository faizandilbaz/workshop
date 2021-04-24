<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_shops', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('link')->nullable();
            $table->string('description')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('time')->nullable();
            $table->string('paper_end_time')->nullable();
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
        Schema::dropIfExists('work_shops');
    }
}
