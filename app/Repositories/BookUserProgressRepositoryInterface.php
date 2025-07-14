<?php

namespace App\Repositories;

interface BookUserProgressRepositoryInterface
{
    public function getProgress(int $userId, int $bookId): int;

    public function updateProgress(int $userId, int $bookId, int $currentPage): void;

    public function resetProgress(int $userId, int $bookId): void;

    public function getBooksInProgress(int $userId): Collection;

    public function hasStartedBook(int $userId, int $bookId): bool;
}
