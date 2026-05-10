<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['name' => 'Pizza Roma', 'latitude' => 52.2297, 'longitude' => 21.0122, 'category' => 'pizza', 'rating' => 4.5, 'album_number' => '79016'],
            ['name' => 'Sushi Tokyo', 'latitude' => 52.2310, 'longitude' => 21.0200, 'category' => 'sushi', 'rating' => 4.8, 'album_number' => '79016'],
            ['name' => 'Burger King PL', 'latitude' => 52.2280, 'longitude' => 21.0050, 'category' => 'burger', 'rating' => 3.9, 'album_number' => '79016'],
            ['name' => 'Green Vegan', 'latitude' => 52.2350, 'longitude' => 21.0150, 'category' => 'vegan', 'rating' => 4.6, 'album_number' => '79016'],
            ['name' => 'Krakow Pizza', 'latitude' => 50.0647, 'longitude' => 19.9450, 'category' => 'pizza', 'rating' => 4.2, 'album_number' => '79016'],
            ['name' => 'Gdansk Sushi', 'latitude' => 54.3520, 'longitude' => 18.6466, 'category' => 'sushi', 'rating' => 4.7, 'album_number' => '79016'],
            ['name' => 'Katowice Burger', 'latitude' => 50.2649, 'longitude' => 19.0238, 'category' => 'burger', 'rating' => 4.1, 'album_number' => '79016'],
            ['name' => 'Vegan Heaven', 'latitude' => 50.2700, 'longitude' => 19.0300, 'category' => 'vegan', 'rating' => 4.4, 'album_number' => '79016'],
            ['name' => 'Roma Express', 'latitude' => 50.2600, 'longitude' => 19.0100, 'category' => 'pizza', 'rating' => 3.8, 'album_number' => '79016'],
            ['name' => 'Tokyo Garden', 'latitude' => 50.2580, 'longitude' => 19.0180, 'category' => 'sushi', 'rating' => 4.9, 'album_number' => '79016'],
        ];

        foreach ($restaurants as $data) {
            Restaurant::create($data);
        }
    }
}