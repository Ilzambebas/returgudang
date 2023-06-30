<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User;
        $data->nama_user = 'Rifjan';
        $data->username = 'rifjan';
        $data->password = Hash::make('password');
        $data->level = 'admin';
        $data->save();
    }
}
