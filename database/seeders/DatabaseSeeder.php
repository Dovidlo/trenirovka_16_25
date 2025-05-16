<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        // сидер для таблиц бд если нужно
        // DB::table('categories')->insert([
        //     ['title' => 'рисунок'],
        //     ['title' => 'акварель'],
        //     ['title' => 'гуашь'],
        //     ['title' => 'другое'],
        // ]);
    }
}
