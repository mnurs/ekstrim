<?php

namespace Database\Seeders;

use App\Models\Front\SectionTitle;
use Illuminate\Database\Seeder;

class SectionTitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionTitle::create([
            'name' => 'gallery-section',
            'title' => 'Our Service Gallery',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'
        ]);
        SectionTitle::create([
            'name' => 'doctor-section',
            'title' => 'Most Popular Doctors',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'
        ]);
        SectionTitle::create([
            'name' => 'testimonial-section',
            'title' => 'What Other People are Saying',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'
        ]);
        SectionTitle::create([
            'name' => 'news-section',
            'title' => 'Stories, Tips & Latest News',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'
        ]);
        SectionTitle::create([
            'name' => 'service-section',
            'title' => 'Our Medical Service',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'
        ]);
        SectionTitle::create([
            'name' => 'faq-section',
            'title' => 'Faq Section',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'
        ]);
    }
}
