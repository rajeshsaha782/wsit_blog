<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('detail');

             $table->integer('blog_id')->unsigned();
             $table->index(['blog_id']);
             $table->foreign('blog_id')
                    ->references('id')->on('blogs')
                    ->onDelete('cascade');
        
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
        Schema::dropIfExists('blogs_detail');
    }
}
