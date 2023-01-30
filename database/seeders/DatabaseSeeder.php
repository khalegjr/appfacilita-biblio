<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $genres = \App\Models\Genre::factory(10)->create();

        \App\Models\User::factory(30)->create();

        \App\Models\Book::factory(40)->create()
            ->each(function($book) use($genres){
                $book->genres()->attach($genres->random(2));
            });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
