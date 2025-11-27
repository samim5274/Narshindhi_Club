<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Membership;
use Carbon\Carbon;

class MembershiopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Membership::updateOrCreate(
            ['phone' => '01762164746'],  
            [
                'name'             => 'SAMIM HOSSEN',
                'email'            => 'samim@example.com',
                'membership_type'  => 'Platinum',  
                'point'            => 0,
                'start_date'       => Carbon::now()->format('Y-m-d'),
                'expiry_date'      => Carbon::now()->addYear()->format('Y-m-d'),
                'is_active'        => 1,
                'remarks'          => 'Auto-generated member.',
            ]
        );
    }
}
