<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDeInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_de_insumos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('numero_de_tanque');
            $table->string('melaza');
            $table->string('boitec');
            $table->string('concentrado');
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
        Schema::dropIfExists('control_de_insumos');
    }
}
