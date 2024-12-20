<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run()
    {
        $test = "1234567890";
        $users = [
            [
                'nama_user' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make($test),
                'id_jenis_user' => 1,
                'no_hp' => '08123456789',
                'pin' => '1234',
            ],
            [
                'nama_user' => 'Regular Mhs',
                'username' => 'mahasiswa',
                'email' => 'mhs@gmail.com',
                'password' => Hash::make($test),
                'id_jenis_user' => 2,
                'no_hp' => '08123456789',
                'pin' => '5678',
            ],
            [
                'nama_user' => 'Regular Dosen',
                'username' => 'dosen',
                'email' => 'dosen@gmail.com',
                'password' => Hash::make($test),
                'id_jenis_user' => 3,
                'no_hp' => '08123456789',
                'pin' => '5678',
            ]
        ];

        foreach ($users as $user) {
            // Cek jika email sudah ada
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert(array_merge($user, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }
    }
}
