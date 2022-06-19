<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'slug' => Str::slug('admin'),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Singgih Sutan Syach',
            'slug' => Str::slug('Singgih Sutan Syach'),
            'email' => 'singgih@gmail.com',
            'phone' => '083101463182',
            'city' => 'Subang',
            'address' => 'Pamanukan, Subang',
            'zipcode' => '41254',
            'password' => bcrypt('singgih1')
        ]);

        $user->assignRole('user');
    }
}
