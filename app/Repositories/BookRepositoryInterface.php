<?php

namespace App\Repositories;

interface BookRepositoryInterface
{
    public function all();

    public function getBookBySlug(string $slug);
}
