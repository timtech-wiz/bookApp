<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            "book" => [ 
            'id' => $this->id ?? null,
            'name' => $this->name,
            'isbn' => $this->isbn,
            'authors' => [
                $this->authors
            ],
            'numberOfPages' => $this->numberOfPages,
            'publisher' => $this->publisher,
            'country' => $this->country,
            'released' => $this->released,
            ]
        ];
    }
}
