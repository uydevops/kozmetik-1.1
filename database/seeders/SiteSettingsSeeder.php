<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSettings;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $SiteSettings = [
            [
                'settings_name' => 'site_name',
                'settings_value' => 'Laravel 8 Admin Panel',
            ],

            [
                'settings_name' => 'site_phone',
                'settings_value' => '507 892 84 90',
            ]

        ];
        $SiteSettings = SiteSettings::insert($SiteSettings);
    }
}
