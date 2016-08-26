<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("City", function (Blueprint $t) {
            $t->increments("id_city");
            $t->string("label");

            #foreign
            $t->integer("id_country")->unsigned();
            $t->foreign("id_country")
                ->references("id_country")
                ->on("country")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("City", function (Blueprint $t) {
            $t->dropForeign(['id_country']);
        });
        Schema::drop("City");
    }
}
