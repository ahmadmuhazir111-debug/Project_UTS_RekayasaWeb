<?php

namespace Database\Seeders;

use App\Models\Shoe;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    public function run(): void
    {
        $shoes = [
            ['name' => 'Air Zoom Pegasus 40', 'brand' => 'Nike', 'price' => 1829000, 'size_range' => '39 - 46', 'image' => 'air zoom pegasus 40.jpg', 'sport_type' => 'Running'],
            ['name' => 'Adizero Boston 12', 'brand' => 'Adidas', 'price' => 2199000, 'size_range' => '38 - 45', 'image' => 'adizero boston 12.jpg', 'sport_type' => 'Running'],
            ['name' => 'Gel-Kayano 30', 'brand' => 'ASICS', 'price' => 2499000, 'size_range' => '39 - 47', 'image' => 'gel kayano 30.jpg', 'sport_type' => 'Running'],
            ['name' => 'Deviate Nitro 2', 'brand' => 'Puma', 'price' => 2399000, 'size_range' => '39 - 45', 'image' => 'deviate nitro 2.jpg', 'sport_type' => 'Running'],
            ['name' => 'Kobe 6 Protro', 'brand' => 'Nike', 'price' => 2349000, 'size_range' => '40 - 47', 'image' => 'kobe 6 protro.jpg', 'sport_type' => 'Basket'],
            ['name' => 'Predator Elite FG', 'brand' => 'Adidas', 'price' => 3299000, 'size_range' => '38 - 46', 'image' => 'predator elite fg.webp', 'sport_type' => 'Sepak Bola'],
            ['name' => 'Wave Momentum 3', 'brand' => 'Mizuno', 'price' => 1599000, 'size_range' => '39 - 46', 'image' => 'wave momentum 3.webp', 'sport_type' => 'Voli'],
            ['name' => 'Curry 11', 'brand' => 'Under Armour', 'price' => 2199000, 'size_range' => '40 - 48', 'image' => 'curry 11.jpg', 'sport_type' => 'Basket'],
            ['name' => 'Fresh Foam X 1080v13', 'brand' => 'New Balance', 'price' => 2599000, 'size_range' => '39 - 46', 'image' => 'Fresh Foam X 1080v13.jpg', 'sport_type' => 'Running'],
            ['name' => 'Novablast 4', 'brand' => 'ASICS', 'price' => 2299000, 'size_range' => '39 - 47', 'image' => 'novablast 4.jpg', 'sport_type' => 'Running'],
            ['name' => 'LeBron 21', 'brand' => 'Nike', 'price' => 3199000, 'size_range' => '40 - 47', 'image' => 'lebron 21.jpg', 'sport_type' => 'Basket'],
            ['name' => 'Harden Vol. 8', 'brand' => 'Adidas', 'price' => 2799000, 'size_range' => '39 - 46', 'image' => 'Harden Vol. 8.jpg', 'sport_type' => 'Basket'],
            ['name' => 'Mercurial Vapor 15 Pro FG', 'brand' => 'Nike', 'price' => 1899000, 'size_range' => '39 - 45', 'image' => 'Mercurial Vapor 15 Pro FG.jpg', 'sport_type' => 'Sepak Bola'],
            ['name' => 'Future 7 Ultimate FG/AG', 'brand' => 'Puma', 'price' => 2999000, 'size_range' => '39 - 45', 'image' => 'Future 7 Ultimate FG.avif', 'sport_type' => 'Sepak Bola'],
            ['name' => 'Sky Elite FF 3', 'brand' => 'ASICS', 'price' => 2199000, 'size_range' => '39 - 46', 'image' => 'Sky Elite FF 3.webp', 'sport_type' => 'Voli'],
            ['name' => 'Wave Lightning Z8', 'brand' => 'Mizuno', 'price' => 1999000, 'size_range' => '39 - 46', 'image' => 'Wave Lightning Z8.jpg', 'sport_type' => 'Voli'],
        ];

        foreach ($shoes as $shoe) {
            $existingShoe = Shoe::query()
                ->where('name', $shoe['name'])
                ->oldest('id')
                ->first();

            if ($existingShoe === null) {
                Shoe::create($shoe);

                continue;
            }

            $existingShoe->update($shoe);

            Shoe::query()
                ->where('name', $shoe['name'])
                ->where('id', '!=', $existingShoe->id)
                ->delete();
        }
    }
}
