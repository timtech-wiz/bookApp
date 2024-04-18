<?php
namespace App\Services\IceAndFire;

use App\Services\IceAndFire\DataTransferObjects\BookData;
 use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class IceAndFireService {
    public function __construct(
        private readonly string $uri
    )
    {
        
    }

    public function books(): Collection
    {
        $books = Http::get($this->url('books'))->json();
        //dd($books);
        return collect($books)
        ->map(fn (array $data) => BookData::fromArray($data));
    }

    public function book($id): BookData
    {
        $book = Http::get($this->url("books/$id"))->json();
        //dd($books);
        return BookData::fromArray($book);
    }

 



    private function url(string $path): string
    {
        return "{$this->uri}/$path";
    }
}