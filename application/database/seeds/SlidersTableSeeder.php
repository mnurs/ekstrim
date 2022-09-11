<?php

namespace Database\Seeders;

use App\Models\Front\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'user_id' => 1,
            'image' => '1627882809hero-banner.png',
            'icon' => 'flaticon-pulse-line',
            'small_heading' => 'Best Care, Best Service',
            'big_heading' => 'Best Hospital With Best Professionals',
            'description' => 'Best Supplement dolor sit amet, id nec mod amet tanta setu ocurreret stet laboramus cuusurequi te ipsum voluptat.',
            'status' => '1'
        ]);
        Slider::create([
            'user_id' => 1,
            'image' => '1622116731hero-banner-2.png',
            'icon' => 'flaticon-pulse-line',
            'small_heading' => 'Care For Your Heath & Satisfaction',
            'big_heading' => 'We Care Our Patient With Tons Of Love',
            'description' => 'Best Supplement dolor sit amet, id nec mod amet tanta setu ocurreret stet laboramus cuusurequi te ipsum voluptat.',
            'status' => '1'
        ]);
    }
}
