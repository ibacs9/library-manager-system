<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Models\BookRental;
use Carbon\Carbon;


class BookUserProgressRepository implements BookUserProgressRepositoryInterface
{
    public function getProgress(int $userId, int $bookId):int
    {
        return 1;
    }

    public function updateProgress(int $userId, int $bookId, int $currentPage): void
    {

    }

    public function resetProgress(int $userId, int $bookId): void
    {

    }

    public function getBooksInProgress(int $userId): Collection
    {
        return false;
    }

    public function hasStartedBook(int $userId, int $bookId): bool
    {
        return false;
    }
}
