<?php

use Illuminate\Database\Seeder;

class CantanteDiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CantanteDisco::class,2)->create(); 
    }
}
