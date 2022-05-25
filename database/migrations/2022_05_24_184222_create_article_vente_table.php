<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_vente', function (Blueprint $table) {
            $table->foreignId("article_id")->constrained();
            $table->foreignId("vente_id")->constrained();
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
        Schema::table('article_vente', function(Blueprint $table) {
            $table->dropForeign(["article_id", "vente_id"]);
        });
        Schema::dropIfExists('article_vente');
    }
}
