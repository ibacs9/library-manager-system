<?php

namespace App\Services;

use App\Repositories\BookRepositoryInterface;
use App\Repositories\BookRentalRepositoryInterface;
use App\Repositories\BookUserProgressRepositoryInterface;

class BookService
{
    protected $bookRepository;
    protected $bookRentalRepository;
    protected $bookUserProgressRepository;

    public function __construct(BookRepositoryInterface $bookRepository,BookRentalRepositoryInterface $bookRentalRepository,BookUserProgressRepositoryInterface $bookUserProgressRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->bookRentalRepository = $bookRentalRepository;
        $this->bookUserProgressRepository = $bookUserProgressRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepository->all();
    }

    public function setRental($id)
    {

        return $this->bookRentalRepository->setRental($id);
    }

    public function getUserProgressForBook(int $bookId): int
    {
        $userId = auth()->id();
        return $this->bookUserProgressRepository->getProgress($userId, $bookId);
    }

    public function updateProgress(int $bookId, int $page): void
    {
        $userId = auth()->id();
        $this->bookUserProgressRepository->updateProgress($userId, $bookId, $page);
    }

    public function getBookBySlug(string $slug)
    {

        return $this->bookRepository->getBookBySlug($slug);
    }
}
