<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorPickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_pickers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color_code');
            $table->string('rgba');
            $table->string('footer_color_code');
            $table->string('copyright_code');
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
        Schema::dropIfExists('color_pickers');
    }
}
