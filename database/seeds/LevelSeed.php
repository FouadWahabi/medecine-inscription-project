<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Level')->insert([
            'label' => '1er année'
        ]);
        DB::table('Level')->insert([
            'label' => '2eme année'
        ]);
        DB::table('Level')->insert([
            'label' => '3eme année'
        ]);
    }
}