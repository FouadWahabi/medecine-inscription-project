<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("Student", function (Blueprint $t) {
            $t->increments("id_student");
            $t->string("last_name");
            $t->string("first_name");
            $t->string("second_name");
            $t->char("sex", 5);
            $t->date("birthday");
            $t->string("mobile");
            $t->string("phone");
            $t->string("mail");
            $t->integer("study_access_year")->unsigned();
            $t->boolean("oriented");
            $t->string("origin_university");
            $t->string("password");
            $t->boolean("valid");
            $t->string("qr_code");
            $t->string("login");
            $t->string("cin");
            $t->string("passport");
            $t->boolean("valid_from_administration");
            $t->string("confirmation_code");
            $t->string("img");

            #foreign
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
        Schema::table("Bac", function (Blueprint $t) {
            $t->dropForeign(['id_city']);
        });
        Schema::drop("Student");
    }
}
