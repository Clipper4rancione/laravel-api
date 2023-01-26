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
        Schema::table('projects', function (Blueprint $table) {
            // Creo La colonna della FK
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            //Assegno la FK alla colonna creata
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('set null'); // Quando viene eliminata un tipo nella tabella project, type_id = null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Elimino la FK
            $table->dropForeign(['type_id']);
            // Elimino la colonna
            $table->dropColumn('type_id');
        });
    }
};
