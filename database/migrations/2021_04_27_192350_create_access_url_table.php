<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('access_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('application_id')->unsigned()->index();
            
            $table->string('accsess_url_environment_name');
            $table->text('url');
            
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
        Schema::dropIfExists('access_urls');
    }
}
