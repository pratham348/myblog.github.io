<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blogdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogdetails', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('description');
            $table->string('image');
            $table->string('full_description');
            $table->string('tweet');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('youtube');
            $table->boolean('status');
            $table->rememberToken();
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
        //
    }
}
