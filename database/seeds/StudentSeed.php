<?php

use Illuminate\Database\Seeder;

class StudentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('Student')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('Student')->insert([
            'nom' => 'grad1'
        ]);
        DB::table('Grade')->insert([
            'nom' => 'grad2'
        ]);
    }
}
