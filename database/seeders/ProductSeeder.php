<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Create a Faker instance

        for ($i = 0; $i < 9; $i++) { // Change the number to however many products you want
            Product::create([
                'image' => 'https://s3.emmezeta.hr/media/catalog/product/6/5/655455-alegra-kutna-garnitura-s-lezajem-zelena-desna-277x237x75-93-cm_1.jpg', // Random image URL
                'title' => $faker->word, // Random word as title
                'description' => $faker->sentence, // Random sentence as descriptionndom price between 5 and 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
