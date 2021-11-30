<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('appname');
            $table->string('environment_name');
            $table->string('platform');
            
            $table->string('aws_ip_adress')->nullable($value = true);
            $table->string('aws_console_id')->nullable($value = true);
            $table->string('aws_console_pw')->nullable($value = true);
            
            $table->string('ssh_user_name');
            $table->string('ssh_pw');
            
            $table->string('ssh_secret_key_name')->nullable($value = true);
            $table->text('ssh_secret_key_adress')->nullable($value = true);
            
            $table->text('git_url');
            $table->string('git_branch')->nullable($value = true);
            $table->string('git_commitid')->nullable($value = true);
            
            $table->integer('active')->nullable($value = true);
            
            $table->string('find')->nullable($value = true);
            
            $table->integer('url_form_number')->default(1);
            $table->integer('id_form_number')->default(1);
            
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
        Schema::dropIfExists('applications');
    }
}
