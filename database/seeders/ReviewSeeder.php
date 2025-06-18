<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'id' => 1,
            'movie_id' => 1,
            'poster' => 'movie-01.jpg',
            'user' => '3k',
            'rate' => '5/5',
            'date' => '2004-1-1',
        ]);
        
        Review::create([
            'id' => 2,
            'movie_id' => 2,
            'poster' => 'movie-02.jpg',
            'user' => '2k',
            'rate' => '3/5',
            'date' => '2004-1-1',
        ]);

        Review::create([
            'id' => 3,
            'movie_id' => 3,
            'poster' => 'movie-03.jpg',
            'user' => '5k',
            'rate' => '4/5',
            'date' => '2004-1-1',
        ]);

        Review::create([
            'id' => 4,
            'movie_id' => 4,
            'poster' => 'movie-04.jpg',
            'user' => '1M',
            'rate' => '5/5',
            'date' => '2004-1-1',
        ]);

        Review::create([
            'id' => 5,
            'movie_id' => 5,
            'poster' => 'movie-05.jpg',
            'user' => '5M',
            'rate' => '5/5',
            'date' => '2004-1-1',
        ]);


    }
}
