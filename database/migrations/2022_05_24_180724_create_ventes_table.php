<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->dateTime("dateDebut");
            $table->dateTime("DateFin");
            $table->foreignId("client_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("statut_vente_id")->constrained();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventes', function(Blueprint $table) {
            $table->dropForeign(["client_id", "user_id", "statut_vente_id"]);
        });
        Schema::dropIfExists('ventes');
    }
}
