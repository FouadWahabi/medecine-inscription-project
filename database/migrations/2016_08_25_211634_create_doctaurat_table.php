<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDoctauratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Doctaurat", function (Blueprint $t) {
            $t->increments("id_doctaurat");
            $t->date("date_of_pitch");
            $t->integer("numero")->unsigned();

            #foreign
            $t->integer("id_student")->unsigned();
            $t->integer("id_university")->unsigned();
            $t->integer("id_mention")->unsigned();


            $t->foreign("id_university")
                ->on("University")
                ->references("id_university")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_mention")
                ->on("Mention")
                ->references("id_mention")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->foreign("id_student")
                ->on("Student")
                ->references("id_student")
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
        Schema::table("Doctaurat", function (Blueprint $t) {
            $t->dropForeign(['id_university']);
            $t->dropForeign(['id_mention']);
            $t->dropForeign(['id_student']);
        });
        Schema::drop("Doctaurat");
    }
}
