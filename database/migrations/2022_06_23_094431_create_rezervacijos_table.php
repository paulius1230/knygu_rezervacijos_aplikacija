<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezervacijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezervacijos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('knygos_id');
            $table->foreign('knygos_id')->references('id')->on('knygos')->onDelete('cascade');
            $table->unsignedBigInteger('vartotojo_id');
            $table->foreign('vartotojo_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('rezervacijos');
    }
}
