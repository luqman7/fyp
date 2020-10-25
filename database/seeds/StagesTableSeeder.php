<?php

use FYP\Stage;
use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stage::create([
            'name' => 'Stage 1',
            'slug' => str_slug('Stage 1')
        ]);
        Stage::create([
            'name' => 'Stage 2',
            'slug' => str_slug('Stage 2')
        ]);
        Stage::create([
            'name' => 'Diagnostic Stage',
            'slug' => str_slug('Diagnostic Stage')
        ]);
    }
}
