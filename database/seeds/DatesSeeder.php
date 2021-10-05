<?php

use App\Date;
use Illuminate\Database\Seeder;

class DatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Date::class, 200)->create();
    }
}
