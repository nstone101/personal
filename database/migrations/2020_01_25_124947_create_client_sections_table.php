<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('job');
            $table->text('feedback');
            $table->integer('star');
            $table->string('approval')->default(0);
            $table->string('client_image')->nullable();
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
        Schema::dropIfExists('client_sections');
    }
}
