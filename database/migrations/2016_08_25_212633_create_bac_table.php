<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
            $t->integer("id_type")->unsigned();
            $t->integer("id_mention")->unsigned();
            $t->double("average");
            $t->string("school");

            $t->integer("id_type")
                ->on("Type")
                ->references('id_type')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $t->integer("id_mention")
                ->on("Mention")
                ->references('id_mention')
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
        });
        Schema::drop("Bac");
    }
}
