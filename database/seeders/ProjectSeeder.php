<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'type_id' => null,
                'title' => 'iPhone 15 Website',
                'description' => 'lorem description project 1 ipsum sum pronobis opus cementitio',
                'image' => null,
                'live_link' => 'https://iphone15webclone.netlify.app/',
                'code_link' => 'https://github.com/RiccardoImperiale/iPhone-website-clone',
            ],
        ];

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->type_id = $project['type_id'];
            $newProject->title = $project['title'];
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->description = $project['description'];
            $newProject->image = $project['image'];
            $newProject->live_link = $project['live_link'];
            $newProject->code_link = $project['code_link'];
            $newProject->save();
        }
    }
}
