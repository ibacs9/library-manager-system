<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            [
                'title' => 'A Gyűrűk Ura',
                'author' => 'J. R. R. Tolkien',
                'img' => 'gyurukura.jpg',
                'rate' => 4.8,
                'quantity' => 5,
                'link' => '/books/1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Harry Potter és a Bölcsek Köve',
                'author' => 'J. K. Rowling',
                'img' => 'harrypotter.jpg',
                'rate' => 4.7,
                'quantity' => 8,
                'link' => '/books/2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A szolgálólány meséje',
                'author' => 'Margaret Atwood',
                'img' => 'szolgalolany.jpg',
                'rate' => 4.2,
                'quantity' => 3,
                'link' => '/books/3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
