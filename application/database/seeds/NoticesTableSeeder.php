<?php

namespace Database\Seeders;

use App\Models\Front\Notice;
use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notice::create([
            'icon' => 'flaticon-exclamation',
            'title' => 'Covid-19',
            'description' => 'covid-19 catastrophe and the economic challenges facing bangladesh',
            'button_text' => 'View Details',
            'button_url' => '#',
            'status' => '1'
        ]);
    }
}
