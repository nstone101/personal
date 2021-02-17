<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('workshop_preview_id');
            $table->foreign('workshop_preview_id')->references('id')->on('workshop_previews')->onDelete('cascade');
            $table->string('slider_image');
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('workshop_sliders');
    }
}
