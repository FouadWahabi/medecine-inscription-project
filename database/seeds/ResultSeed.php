<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Result')->insert([
            'label' => 'redoublant'
        ]);
        DB::table('Result')->insert([
            'label' => 'admis'
        ]);
        DB::table('Result')->insert([
            'label' => 'redoublant'
        ]);
    }
}