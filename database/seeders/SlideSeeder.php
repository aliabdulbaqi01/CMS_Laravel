<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slides')->insert([
            'title' => 'I will give you Best product in the shortest time',
            'short_title' => 'I\'m a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences',
            'image' => 'frontend/assets/img/banner/banner_img.png',
            'video_url' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
        ]);
    }
}
