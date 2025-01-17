<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class settingSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'My Website',
            'logo' => 'default-logo.png',
            'phone' => '123456789',
            'email' => 'admin@example.com',
            'github_link' => 'https://github.com/example',
            'linkedin_link' => 'https://linkedin.com/in/example',
            'about_photo_1' => 'default-about-1.png',
            'about_photo_2' => 'default-about-2.png',
            'address' => '123 Street Name, City, Country',
            'about_description' => 'This is a description of the website.',
        ]);
    }
}
