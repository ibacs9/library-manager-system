<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRental extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'rental_date',
        'return_date'
    ];

}
