<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@example.com'],   
            [
                'name'       => 'SAMIM HOSSEN',
                'email'      => 'admin@example.com',
                'facebook_id'=> null,
                'google_id'  => null,
                'github_id'  => null,
                'password'   => Hash::make('123456789'),
                'photo'      => null,
                'phone'      => '01700000000',
                'address'    => 'Admin Office',
                'dob'        => '2001-01-01',
                'role'       => 1,   
                'status'     => 1,         
            ]
        );
    }
}
