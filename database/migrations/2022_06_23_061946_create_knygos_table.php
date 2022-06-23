<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knygos', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->string('santrauka');
            $table->string('isbn');
            $table->string('nuotrauka');
            $table->integer('puslapiu_skaicius');
            $table->unsignedBigInteger('kategorijos_id');
            $table->foreign('kategorijos_id')->references('id')->on('kategorijos')->onDelete('cascade');
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
        Schema::dropIfExists('knygos');
    }
};
