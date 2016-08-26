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
            

            $t->integer("id_bac")
                ->on("Bac")
                ->references('id_bac')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $t->integer("id_adress")
                ->on("Adress")
                ->references('id_adress')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->integer("id_city")
                ->on("City")
                ->references('id_city')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->integer("id_fonction")
                ->on("Fonction")
                ->references('id_fonction')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->integer("id_doctaurat")
                ->on("Doctaurat")
                ->references('id_doctaurat')
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
        //
    }
}
