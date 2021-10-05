<?php

use App\Permit;
use Illuminate\Database\Seeder;

class PermitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Permit::class, 200)->create();
        // Permit::factory()->count(200)->create();
    }
}
