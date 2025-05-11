<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\PaymentInformation;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'phone_number' => '1234567890',
            'user_role' => 'admin',
            'address' => 'Random street',
            'country' => 'Slovakia',
            'region' => 'Bratislava',
            'city' => 'Bratislava',
            'zip_code' => '123',
            'payment_information' => 1,
        ]);

        User::factory()->create([
            'name' => 'GuestUser',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'phone_number' => '1234567890',
            'user_role' => 'admin',
            'address' => 'Random street',
            'country' => 'Slovakia',
            'region' => 'Bratislava',
            'city' => 'Bratislava',
            'zip_code' => '123',
            'payment_information' => 2,
        ]);

        User::factory()->create([
            'name' => 'GuestUser2',
            'email' => 'test2@test2.com',
            'password' => Hash::make('test'),
            'phone_number' => '1234567890',
            'user_role' => 'admin',
            'address' => 'Random street',
            'country' => 'Slovakia',
            'region' => 'Bratislava',
            'city' => 'Bratislava',
            'zip_code' => '123',
            'payment_information' => 3,
        ]);

        PaymentInformation::factory()->create([
            'user_id' => 1,
            'card_number' => '1234567890123456',
            'name_on_card' => 'Admin Admin',
        ]);
        PaymentInformation::factory()->create([
            'user_id' => 2,
            'card_number' => '1234567890123456',
            'name_on_card' => 'Guest User',
        ]);
        PaymentInformation::factory()->create([
            'user_id' => 3,
            'card_number' => '1234567890123456',
            'name_on_card' => 'Guest User 2',
        ]);

        $categories = ['guitar', 'bass', 'amp'];
        $colors = ['red', 'blue', 'black'];
        $guitarNames = [
            'ESP',
            'Cort',
            'Les Paul',
            'Harley Benton',
            'Fender',
            'Jackson',
            'Flying V',
            'PRS',
            'Yamaha',
            'Squier'
        ];
        $guitarDescriptions = [
            'A classic single-coil guitar known for its bright, clean tones.',
            'A legendary solid-body guitar with twangy, crisp sound.',
            'A humbucker-equipped icon great for rock and metal.',
            'A lightweight guitar with punchy mids and smooth neck access.',
            'An offset guitar perfect for alternative and indie rock.',
            'A radical design with powerful pickups and heavy tone.',
            'A unique shape with a powerful sound, great for solos.',
            'A solid body with a single cutaway for easy access to higher frets.',
            'A double cutaway design with a bright, snappy tone.',
            'A modern design with no headstock for better tuning stability.'
        ];

        for ($i = 0; $i < 3; $i++) {
            $name = "Jackson";
            $description = $guitarDescriptions[0];
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[$i],
                'product_price' => rand(100, 10000),
                'product_category' => $categories[0],
                'product_color' => $colors[$i],
                'quantity' => rand(1, 100),
                'product_description' => $description,
                'product_image' => 'badass_guitar.png',
                'product_image_second' => 'badass_guitar.png',
            ]);
        }
        ;

        // Create guitars
        for ($i = 0; $i < 10; $i++) {

            $name = $guitarNames[$i] . ' ' . Str::random(5);
            $description = $guitarDescriptions[$i];
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[0],
                'product_price' => rand(100, 10000),
                'product_category' => $categories[0],
                'product_color' => $colors[0],
                'quantity' => rand(1, 100),
                'product_description' => $description,
                'product_image' => $i . '_' . $colors[0] . '.png',
                'product_image_second' => $i . '_2' . $colors[0] . '.png',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[1],
                'product_price' => rand(100, 10000),
                'product_category' => $categories[0],
                'product_color' => $colors[1],
                'quantity' => rand(1, 100),
                'product_description' => $description,
                'product_image' => $i . '_' . $colors[1] . '.png',
                'product_image_second' => $i . '_' . $colors[1] . '.png',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[2],
                'product_price' => rand(100, 10000),
                'product_category' => $categories[0],
                'product_color' => $colors[2],
                'quantity' => rand(1, 100),
                'product_description' => $description,
                'product_image' => $i . '_' . $colors[2] . '.png',
                'product_image_second' => $i . '_' . $colors[2] . '.png',
            ]);
        }

        $bassNames = [
            'Cort',
            'Fender',
            'FGN',
            'Hamaril',
            'Harley Benton',
            'Maybach',
            'Sandberg',
            'Squier',
            'Vincent',
            'Flight'
        ];
        $bassDescriptions = [
            'A classic single-coil bass known for its bright, clean tones.',
            'A humbucker-equipped icon great for rock and metal.',
            'A legendary solid-body bass with twangy, crisp sound.',
            'An offset bass perfect for alternative and indie rock.',
            'A lightweight bass with punchy mids and smooth neck access.',
            'A unique shape with a powerful sound, great for solos.',
            'A radical design with powerful pickups and heavy tone.',
            'A double cutaway design with a bright, snappy tone.',
            'A solid body with a single cutaway for easy access to higher frets.',
            'A modern design with no headstock for better tuning stability.'
        ];

        // Create basses
        for ($i = 0; $i < 10; $i++) {
            $name = $bassNames[$i] . ' ' . Str::random(5);
            $description = $bassDescriptions[rand(0, 9)];
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[0],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[1],
                'product_color' => $colors[0],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'bass_placeholder.webp',
                'product_image_second' => 'bass_placeholder.webp',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[1],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[1],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'bass_placeholder.webp',
                'product_image_second' => 'bass_placeholder.webp',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[2],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[1],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'bass_placeholder.webp',
                'product_image_second' => 'bass_placeholder.webp',
            ]);
        }

        $ampNames = [
            'Blackstar',
            'Fender',
            'Cort',
            'Fender',
            'Harley Benton',
            'Ibanez',
            'Marshall',
            'Roland',
            'Vox',
            'Flight'
        ];
        $ampDescriptions = [
            'A classic tube amp delivering warm, vintage tones ideal for blues and rock.',
            'A high-gain amp head perfect for modern metal and hard rock performances.',
            'A compact combo amp with built-in effects and crystal-clear clean tones.',
            'A solid-state amp known for its reliability and punchy midrange.',
            'A portable practice amp with headphone out and aux input for jamming.',
            'A boutique amp offering rich harmonics and smooth overdrive.',
            'A hybrid amp combining tube warmth with solid-state clarity.',
            'A high-wattage stage amp built for large venues and clear projection.',
            'A modeling amp with dozens of amp and cab simulations for versatility.',
            'A vintage reissue with spring reverb and tremolo for classic surf tones.'
        ];


        // Create amps
        for ($i = 0; $i < 10; $i++) {
            $name = $ampNames[$i] . ' ' . Str::random(5);
            $description = $ampDescriptions[rand(0, 9)];
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[0],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[2],
                'product_color' => $colors[0],
                'quantity' => rand(1, 50),
                'product_description' => $description,
                'product_image' => 'amp_placeholder.webp',
                'product_image_second' => 'amp_placeholder.webp',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[1],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[2],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => $description,
                'product_image' => 'amp_placeholder.webp',
                'product_image_second' => 'amp_placeholder.webp',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[2],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[2],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => $description,
                'product_image' => 'amp_placeholder.webp',
                'product_image_second' => 'amp_placeholder.webp',
            ]);
        }

        $users = User::pluck('id')->toArray();
        $statuses = ['preparing', 'delivered', 'cancelled'];
        $shipping = ['standard-delivery', 'express-delivery', 'pickup'];

        Order::create([
            'user_id' => $users[array_rand($users)],
            'order_status' => $statuses[array_rand($statuses)],
            'total_price' => rand(150, 3000),
            'address' => 'Order Address ' . $i,
            'country' => 'USA',
            'region' => 'Texas',
            'city' => 'Austin',
            'zip_code' => '73301',
            'shipping_method' => $shipping[array_rand($shipping)],
        ]);

        ShoppingCart::create([
            'user_id' => $users[array_rand($users)],
        ]);
    }
}
