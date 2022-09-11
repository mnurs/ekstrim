<?php

namespace Database\Seeders;

use App\Models\Admin\Faq;
use Illuminate\Database\Seeder;

class FaqTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 1,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 1,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 2,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 2,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 3,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 3,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 4,
        ]);
        Faq::create([
            'question' => 'It is a long established fact that a reader will be distracted?',
            'answer' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.',
            'type' => 4,
        ]);
    }
}
