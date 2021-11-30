<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->string('task_name');
            $table->string('task_details')->nullable($value = true);
            $table->string('state');
            $table->string('deadline')->nullable($value = true);
            $table->string('completion_date')->nullable($value = true);
            
            $table->integer('active')->nullable($value = true);
            $table->string('find')->nullable($value = true);
            $table->integer('note_number')->default(1);
            $table->timestamps(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
