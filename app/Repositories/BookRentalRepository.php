<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Models\BookRental;
use Carbon\Carbon;


class BookRentalRepository implements BookRentalRepositoryInterface
{
    public function setRental($bookId)
    {

        $userId = Auth::id();

        $now = Carbon::now();
        $returnDate = $now->copy()->addDays(5);

        return  BookRental::create([
            'book_id' => $bookId,
            'user_id' => $userId,
            'rental_date' => $now,
            'return_date' => $returnDate,
        ]);
    }

}
