<?php

namespace App\Services\IceAndFire\DataTransferObjects;

use App\Http\Requests\UpsertBookRequest;

class BookData 
{
    public function __construct(
        public readonly string $name,
        public readonly string $isbn,
        public readonly array $authors,
        public readonly string $country,
        public readonly int $numberOfPages,
        public readonly string $publisher,
        public readonly string $released

    )
    {
        
    }


    public static function fromArray(array $data):self
    {
        return new self(
            name: $data['name'],
            isbn: $data['isbn'],
            authors: $data['authors'],
            country: $data['country'],
            numberOfPages: $data['numberOfPages'],
            publisher: $data['publisher'],
            released: $data['released']
    
        );
    }


    
    public static function fromRequest(UpsertBookRequest $request):self
    {
        return new self(
            $request->name,
            $request->isbn,
            $request->authors,
            $request->country,
            $request->numberOfPages,
            $request->publisher,
            $request->released
    
        );
    }
}