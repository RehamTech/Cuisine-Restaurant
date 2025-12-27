<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@laravel.com'],
            [
                'name' => 'Admin User',
                'password' => \Hash::make('12345678'),
            ]
        );

        // Create Categories
        $categories = [
            ['name' => 'Italian Pizza'],
            ['name' => 'Gourmet Burgers'],
            ['name' => 'Fresh Salads'],
            ['name' => 'Desserts'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat['name']],
                ['slug' => \Illuminate\Support\Str::slug($cat['name'])]
            );
        }

        // Create meals
        $meals = [
            [
                'name' => 'Margherita Pizza',
                'description' => 'Classic Italian pizza with tomato, mozzarella, and basil',
                'price' => 12.99,
                'category_id' => 1,
            ],
            [
                'name' => 'Classic Cheeseburger',
                'description' => 'Juicy beef patty with cheddar cheese and fresh veggies',
                'price' => 10.99,
                'category_id' => 2,
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Crisp romaine lettuce with parmesan and creamy dressing',
                'price' => 8.99,
                'category_id' => 3,
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Warm cake with a molten chocolate center',
                'price' => 6.99,
                'category_id' => 4,
            ],
        ];

        foreach ($meals as $meal) {
            Meal::updateOrCreate(['name' => $meal['name']], $meal);
        }
    }
}
