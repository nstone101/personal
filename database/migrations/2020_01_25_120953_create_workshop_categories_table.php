<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->string('workshop_category_slug');
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
        Schema::dropIfExists('workshop_categories');
    }
}
