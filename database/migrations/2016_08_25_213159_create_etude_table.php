<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Study", function (Blueprint $t) {
            $t->increments("id_study");
            $t->string("year");

            #foreign
            $t->integer("id_result")->unsigned();
            $t->integer("id_student")->unsigned();
            $t->integer("id_level")->unsigned();
            $t->integer("id_university")->unsigned();

            $t->foreign("id_result")
                ->on("Result")
                ->references('id_result')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_student")
                ->on("Student")
                ->references('id_student')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_level")
                ->on("Level")
                ->references('id_level')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_university")
                ->on("University")
                ->references('id_university')
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
        Schema::table("Fonction", function (Blueprint $t) {
            $t->dropForeign(['id_result']);
            $t->dropForeign(['id_level']);
            $t->dropForeign(['id_university']);
            $t->dropForeign(['id_student']);
        });
        Schema::drop("Study");
    }
}
