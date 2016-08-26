<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Bac", function (Blueprint $t) {
            $t->increments("id_bac");
            $t->string("year");
            $t->double("average");
            $t->string("school");


            #foreign
            $t->integer("id_type")->unsigned();
            $t->integer("id_mention")->unsigned();
            $t->integer("id_student")->unsigned();


            $t->foreign("id_type")
                ->on("Type")
                ->references('id_type')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_mention")
                ->on("Mention")
                ->references('id_mention')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_student")
                ->on("Student")
                ->references('id_student')
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
        Schema::table("Bac", function (Blueprint $t) {
            $t->dropForeign(['id_mention']);
            $t->dropForeign(['id_type']);
            $t->dropForeign(['id_student']);
        });
        Schema::drop("Bac");
    }
}
