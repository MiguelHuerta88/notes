<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // notes table
        Schema::create('notes', function(Blueprint $table){

            $table->increments('id');
            // user_id
            $table->integer('user_id')->index();

            // title
            $table->string('title');

            // note
            $table->text('note');

            // timestamps
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
        // drop table
        Schema::drop('notes');
    }
}
