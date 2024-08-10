<?php

// database/seeders/ProductSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeederFresh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Iterate over each coffee shop
        for ($shopId = 1; $shopId <= 20; $shopId++) {
            // Generate between 10 and 15 products for each coffee shop
            $productCount = rand(10, 15);
            $products = [];

            for ($i = 1; $i <= $productCount; $i++) {
                $products[] = [
                    'shop_id' => $shopId,
                    'name' => $faker->word . ' ' . $faker->word,
                    'description' => $faker->sentence,
                    'price' => $faker->randomFloat(2, 2, 10),
                    'sku' => strtoupper($faker->word) . '-' . $faker->randomNumber(4, true),
                    'category' => $faker->word,
                    'subcategory' => $faker->word,
                    'ingredients' => json_encode([$faker->word, $faker->word]),
                    'allergens' => json_encode([$faker->word]),
                    'nutritional_info' => json_encode([
                        'Calories' => $faker->numberBetween(50, 500),
                        'Fat' => $faker->randomFloat(1, 0, 50) . 'g',
                        'Sugar' => $faker->randomFloat(1, 0, 50) . 'g'
                    ]),
                    'image' => $faker->imageUrl(300, 300, 'food', true),
                    'ratings' => $faker->randomFloat(1, 1, 5),
                    'reviews_count' => $faker->numberBetween(0, 100),
                    'is_featured' => $faker->boolean,
                ];
            }

            DB::table('products')->insert($products);
        }
    }
}
