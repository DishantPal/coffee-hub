<?php

// database/seeders/CoffeeShopSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ShopSeederFresh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $coffeeShops = [];

        for ($i = 1; $i <= 20; $i++) {
            $coffeeShops[] = [
                'name' => $faker->company . ' Coffee',
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => $faker->country,
                'phone' => $faker->phoneNumber,
                'email' => $faker->companyEmail,
                'business_hours' => json_encode([
                    'Mon-Fri' => $faker->time('H:i') . '-' . $faker->time('H:i'),
                    'Sat-Sun' => $faker->time('H:i') . '-' . $faker->time('H:i'),
                ]),
                'service_areas' => json_encode([$faker->city, $faker->city]),
                'amenities' => json_encode([$faker->word, $faker->word, $faker->word]),
                'logo' => $faker->imageUrl(300, 200, 'coffee', true),
                'website' => $faker->domainName,
                'social_links' => json_encode([
                    'facebook' => $faker->url,
                    'twitter' => $faker->url,
                    'instagram' => $faker->url,
                ]),
                'loyalty_program' => json_encode([
                    'points_per_dollar' => rand(1, 5),
                    'rewards' => $faker->sentence,
                ]),
            ];
        }

        DB::table('shops')->insert($coffeeShops);
    }
}
