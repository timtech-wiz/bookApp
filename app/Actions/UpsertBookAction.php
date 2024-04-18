<?php

namespace App\Actions;

use App\Models\Book;
use App\Services\IceAndFire\DataTransferObjects\BookData;

class UpsertBookAction
{
    public function execute(BookData $bookData, Book $book ): Book
    {
        $book->name = $bookData->name;
        $book->isbn = $bookData->isbn;
        $book->authors = $bookData->authors;
        $book->country = $bookData->country;
        $book->numberOfPages = $bookData->numberOfPages;
        $book->publisher = $bookData->publisher;
        $book->released = $bookData->released;

        $book->save();

        return $book;
     }
}