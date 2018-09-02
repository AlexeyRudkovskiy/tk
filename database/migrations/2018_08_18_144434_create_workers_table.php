<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('full_name');
            $table->date('work_from');

            $table->integer('photo_id', false, true);

            $table->timestamps();

            $table->foreign('photo_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
