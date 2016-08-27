<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitySeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('University')->insert([
            'label' => 'medecin Sfax',
        ]);
        DB::table('University')->insert([
            'label' => 'medecin Tunis',
        ]);
        DB::table('University')->insert([
            'label' => 'medecin Sousse',
        ]);
    }
}