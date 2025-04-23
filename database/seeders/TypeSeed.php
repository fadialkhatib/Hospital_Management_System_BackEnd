<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TypeSeed extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                Type::create([
                        'type' => 'ITAdmin'
                ]);
                Type::create([
                        'type' => 'Emergency Department'
                ]);

                Type::create([
                        'type' => 'WareHouse Department'
                ]);
                Type::create([
                        'type' => 'Normal Department'
                ]);
        }
}
