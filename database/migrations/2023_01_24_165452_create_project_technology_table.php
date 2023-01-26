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
        Schema::create('project_technology', function (Blueprint $table) {

            //In questa tabella pivot:

            //RELAZIONE CON I PROGETTI
            //creo la colonna FK per i progetti
            $table->unsignedBigInteger('project_id');
            //creo la FK per questa colonna
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->cascadeOnDelete(); //All'eliminaizone di una tecnologia o di un progetto viene eliminato il record relativo nella tabella ponte

            //RELAZIONE CON LE TECNOLOGIE
            //creo la FK per le teconologie
            $table->unsignedBigInteger('technology_id');
            //creo la FK per questa colonna
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
