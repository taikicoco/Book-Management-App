<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_ids', function (Blueprint $table) {
            
           
            $table->bigIncrements('id');

            $table->bigInteger('application_id')->unsigned()->index();
            
            
            $table->string('accsess_id_name')->nullable($value = true);
            $table->string('accsess_id')->nullable($value = true);
            $table->string('accsess_pw_name')->nullable($value = true);
            $table->string('accsess_pw')->nullable($value = true);
            
            $table->timestamps(0);
            
            
            $table->foreign('application_id')->references('id')->on('applications') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_ids');
    }
}
