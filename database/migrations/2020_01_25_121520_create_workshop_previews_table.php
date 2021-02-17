<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopPreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_previews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('workshop_category_name');
            $table->integer('workshop_category_id');
            $table->string('preview_image');
            $table->string('project_name');
            $table->text('description');
            $table->string('client')->nullable();
            $table->string('value')->nullable();
            $table->string('author')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
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
        Schema::dropIfExists('workshop_previews');
    }
}
