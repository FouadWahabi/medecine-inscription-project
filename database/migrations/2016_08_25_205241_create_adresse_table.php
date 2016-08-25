<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAdresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Adress", function (Blueprint $t) {
            $t->increments("id_adress");
            $t->string("ligne1");
            $t->string("ligne2");
            $t->integer("postal_code")->unsigned();
            $t->integer("id_city")->unsigned();
            $t->foreign("id_city")
                ->on("City")
                ->references("id_city")
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
        Schema::table("Adress",function(Blueprint $t){
            $t->dropForeign(['id_city']);
        });
        Schema::drop("Adress");
    }
}
