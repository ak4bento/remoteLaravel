<?php

use App\Permit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(PermitsSeeder::class);
        $this->call(DatesSeeder::class);
    }
}
