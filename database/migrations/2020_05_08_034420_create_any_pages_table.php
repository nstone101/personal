<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnyPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('any_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_title');
            $table->text('description');
            $table->string('breadcrumb_image')->nullable();
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->string('slug');
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
        Schema::dropIfExists('any_pages');
    }
}
