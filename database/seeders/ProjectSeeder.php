<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'type_id' => 2,
                'title' => 'iPhone 15 Website',
                'slug' => 'iPhone-15-Website',
                'description' => 'lorem description project 1 ipsum sum pronobis opus cementitio',
                'image' => null,
                'live_link' => 'https://iphone15webclone.netlify.app/',
                'code_link' => 'https://github.com/RiccardoImperiale/iPhone-website-clone',
            ],

        ];
    }
}
