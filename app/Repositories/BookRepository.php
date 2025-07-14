<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\BookRental;

class BookRepository implements BookRepositoryInterface
{
    public function all()
    {
        $userId = Auth::id();
        $books = Book::all();


        $rentedBookIds = $userId
            ? BookRental::where('user_id', $userId)
                ->whereIn('book_id', $books->pluck('id'))
                ->pluck('book_id')
                ->toArray()
            : [];

        $result = $books->map(function ($book) use ($rentedBookIds) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'img' => $book->img,
                'rate' => $book->rate,
                'quantity' => $book->quantity,
                'link' => $book->link,
                'created_at' => $book->created_at,
                'updated_at' => $book->updated_at,
                'is_rented' => in_array($book->id, $rentedBookIds),
            ];
        });


        return $result->all();
    }

    public function getBookBySlug(string $slug)
    {

        return Book::where('link', $slug)->first();
    }
}
