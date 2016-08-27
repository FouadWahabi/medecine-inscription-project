<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Type')->insert([
            'label' => 'Sc exp'
        ]);
        DB::table('Type')->insert([
            'label' => 'Math'
        ]);
        DB::table('Type')->insert([
            'label' => 'Sc exp'
        ]);
        DB::table('Type')->insert([
            'label' => 'Technique'
        ]);
        DB::table('Type')->insert([
            'label' => 'Economie'
        ]);
        DB::table('Type')->insert([
            'label' => 'Lettre'
        ]);
        DB::table('Type')->insert([
            'label' => 'Informatique'
        ]);
    }
}