<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Session::create([
            'MACadress'=>'00:00:00:00:00:00',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'22:22:22:22:22:22',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'33:33:33:33:33:33',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'44:44:44:44:44:44',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'55:55:55:55:55:55',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'66:66:66:66:66:66',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'77:77:77:77:77:77',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'88:88:88:88:88:88',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'99:99:99:99:99:99',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'10:10:10:10:10:10',
            'sessionKey'=>''
        ]);
        Session::create([
            'MACadress'=>'11:11:11:11:11:11',
            'sessionKey'=>''
        ]);
    }
}
