<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name'=>'ITAdmin',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'Ambulance',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'DepartmentReception',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'EmergencyRadioGrapher',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'RadioGrapher',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'EmergencyTestLab',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'TestLab',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'AdmissionMonitor',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'MedicineStoreKeeper',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'EquipmentStoreKeeper',
            'password'=>Hash::make('12345')
        ]);
        Department::create([
            'name'=>'HR',
            'password'=>Hash::make('12345')
        ]);
        
    }
}
