<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateFonctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Fonction", function (Blueprint $t) {
            $t->increments("id_fonction");
            $t->string("nature");
            $t->string("employer");
            $t->date("date_of_inauguration");
            $t->integer("id_adress")
                ->on("Adress")
                ->references('id_adress')
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
        Schema::table("Fonction",function(Blueprint $t){
            $t->dropForeign(['id_adress']);
        });
        Schema::drop("Fonction");
    }
}
