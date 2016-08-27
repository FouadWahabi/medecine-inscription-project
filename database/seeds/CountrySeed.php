<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Country')->insert([
            'label' => 'Tunis'
        ]);
    }
}