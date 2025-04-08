<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TypeSeed::class);
        $this->call(DepartmentSeed::class);
        $this->call(SessionSeed::class);
    }
}
