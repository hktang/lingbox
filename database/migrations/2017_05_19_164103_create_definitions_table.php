<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('entry_id')->unsigned()->index();
            $table->integer('ups')->unsigned()->default(0);
            $table->integer('downs')->unsigned()->default(0);
            $table->string('text')->nullable();
         // $table->unique(array('user_id', 'entry_id'));
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
        Schema::dropIfExists('definitions');
    }
}
