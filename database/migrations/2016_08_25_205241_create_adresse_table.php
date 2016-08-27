<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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


            #foreign
            $t->integer("id_student")->unsigned()->nullable();
            $t->integer("id_fonction")->unsigned()->nullable();
            $t->integer("id_city")->unsigned();

            $t->foreign("id_student")
                ->on("Student")
                ->references("id_student")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_fonction")
                ->on("Fonction")
                ->references("id_fonction")
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::table("Adress", function (Blueprint $t) {
            $t->dropForeign(['id_student']);
            $t->dropForeign(['id_fonction']);
            $t->dropForeign(['id_city']);
        });
        Schema::drop("Adress");
    }
}
