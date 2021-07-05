<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni');
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();


            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiarios');
    }
}
