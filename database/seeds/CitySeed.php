<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('City')->insert([
            'label' => 'Sfax',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Tunis',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Mednine',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Bizert',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Sousse',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Mestir',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Mahdia',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Nabeul',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Gabes',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Tataouin',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Ben Arous',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Gafsa',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Kef',
            'id_Country' => 1
        ]);
        DB::table('City')->insert([
            'label' => 'Jandouba',
            'id_Country' => 1
        ]);
    }
}