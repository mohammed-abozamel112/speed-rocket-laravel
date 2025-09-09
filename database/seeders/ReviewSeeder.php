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
        //
        /* create 3 reviews with names and descriptions according to model
         'name_ar',
        'name_en',
        'review_ar',
        'review_en',
        'image',
        'rating',
        'email', // Uncomment if email is needed
         */
        $reviews = [
            [
                'name_ar' => 'مراجعة 1',
                'name_en' => 'Review 1',
                'review_ar' => 'مراجعة رائعة 1',
                'review_en' => 'Great review 1',
                'image' => 'review1.jpg',
                'rating' => 5,
                'email' => 'client1@example.com',
            ],
            [
                'name_ar' => 'مراجعة 2',
                'name_en' => 'Review 2',
                'review_ar' => 'مراجعة رائعة 2',
                'review_en' => 'Great review 2',
                'image' => 'review2.jpg',
                'rating' => 4,
                'email' => 'client2@example.com',
            ],
            [
                'name_ar' => 'مراجعة 3',
                'name_en' => 'Review 3',
                'review_ar' => 'مراجعة رائعة 3',
                'review_en' => 'Great review 3',
                'image' => 'review3.jpg',
                'rating' => 3,
                'email' => 'client3@example.com',
            ],
        ];
        foreach ($reviews as $review) {
            $review['image'] = asset('storage/' . $review['image']);
            Review::create($review);
        }
    }
}
