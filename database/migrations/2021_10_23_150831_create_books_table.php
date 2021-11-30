<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(0);
            
            $table->string('title');
            $table->string('author')->nullable($value = true);
            // $table->string('book_state')->nullable($value = true);
            // $table->string('book_category')->nullable($value = true);
            // $table->integer('book_number')->nullable($value = true);
            $table->integer('book_flag')->default(0);
            $table->integer('book_order')->default(0);;
            $table->string('borrow_acount')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
