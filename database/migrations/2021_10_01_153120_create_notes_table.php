<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('task_id')->unsigned()->index();
            $table->string('note')->nullable($value = true);
            $table->timestamps(0);
            
            $table->foreign('task_id')->references('id')->on('tasks') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
