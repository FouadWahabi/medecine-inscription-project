<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentionSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Mention')->insert([
            'label' => 'Assez Bien'
        ]);
        DB::table('Mention')->insert([
            'label' => 'Bien'
        ]);
        DB::table('Mention')->insert([
            'label' => 'Trés Bien'
        ]);
        DB::table('Mention')->insert([
            'label' => 'Passable'
        ]);
    }
}