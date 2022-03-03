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
            
            $table->string('title')->nullable(true);
            $table->string('titleKana')->nullable(true);
            $table->string('author')->nullable(true);
            $table->string('authorKana')->nullable(true);
            $table->string('itemPrice')->nullable(true);
            $table->string('itemUrl')->nullable(true);
            $table->string('publisherName')->nullable(true);
            $table->string('salesDate')->nullable(true);
            $table->string('seriesName')->nullable(true);
            $table->string('subTitle')->nullable(true);
            $table->string('subTitleKana')->nullable(true);
            $table->string('largeImageUrl')->nullable(true);
            $table->string('isbn')->nullable(true);
            
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
