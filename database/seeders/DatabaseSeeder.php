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
        // Create guitars
        for ($i = 0; $i < 6; $i++) {
            $name = Str::random(5);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[0],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[0],
                'product_color' => $colors[0],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => $i.'_'.$colors[0].'.png',
                'product_image_second' => $i.'_2'.$colors[0].'.png',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[1],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[0],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => $i.'_'.$colors[1].'.png',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[2],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[0],
                'product_color' => $colors[2],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => $i.'_'.$colors[2].'.png',
            ]);
        }
        // Create basses
        for ($i = 0; $i < 50; $i++) {
            $name = Str::random(5);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[0],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[1],
                'product_color' => $colors[0],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'bass_placeholder.webp',
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
            ]);
        }

        // Create basses
        for ($i = 0; $i < 50; $i++) {
            $name = Str::random(5);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[0],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[2],
                'product_color' => $colors[0],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'amp_placeholder.webp',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[1],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[2],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'amp_placeholder.webp',
            ]);
            Product::create([
                'product_visible_name' => $name,
                'product_link_name' => $name . '-' . $colors[2],
                'product_price' => rand(100, 1000),
                'product_category' => $categories[2],
                'product_color' => $colors[1],
                'quantity' => rand(1, 50),
                'product_description' => 'This is a great instrument.',
                'product_image' => 'amp_placeholder.webp',
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
