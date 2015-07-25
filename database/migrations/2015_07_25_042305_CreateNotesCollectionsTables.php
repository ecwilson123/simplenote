<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesCollectionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function(Blueprint $table){
           $table->increments('id');
           $table->integer('user_id')->unsigned()->nullable();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
           $table->string('name')->default('');
           $table->boolean('is_public')->default(false);
           $table->timestamps();
        });
        
        Schema::create('notes', function(Blueprint $table){
           $table->increments('id');
           $table->integer('user_id')->unsigned()->nullable();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
           $table->string('title')->default('');
           $table->integer('collection_id')->unsigned()->nullable();
           $table->foreign('collection_id')->references('id')->on('collections')->onDelete('set null');
           $table->boolean('is_public')->default(false);
           $table->longText('body_text')->default('');
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
        Schema::drop('collections');
        Schema::drop('notes');
    }
}
