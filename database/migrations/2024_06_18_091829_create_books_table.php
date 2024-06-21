<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher_name'); // Make sure this field is included
            $table->integer('published_year');
            $table->string('category');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
