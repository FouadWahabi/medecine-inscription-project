<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeSeed::class);
        $this->call(MentionSeed::class);
        $this->call(ResultSeed::class);
        $this->call(CountrySeed::class);
        $this->call(CitySeed::class);
        $this->call(UniversitySeed::class);
        $this->call(LevelSeed::class);
    }
}
