<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Note::factory(10)->create();
    }
}
