<?php

namespace App\Http\Controllers\Api;

use App\Actions\UpsertBookAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\IceAndFire\DataTransferObjects\BookData;
use App\Services\IceAndFire\IceAndFireService;

class BooksController extends Controller
{

    public function __construct(
        private readonly IceAndFireService $iceAndFireService,
        private readonly UpsertBookAction $upsertBookAction 
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->iceAndFireService->books();
         return new BookCollection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpsertBookRequest $request)
    {
        
        $book = $this->upsert($request, new Book());
        
        return [
            "status_code" => 201,
            "status" => "success",
            "data" => new BookResource($book)
        ]; 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->iceAndFireService->book($id);
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpsertBookRequest $request, Book $book)
    {
        $book = $this->upsert($request, $book);
        return [
            "status_code" => 200,
            "status" => "success",
            "data" => new BookResource($book)
        ]; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return [
            "status_code" => 204,
            "status" => "success",
            "message" => "The book My First Book was deleted successfully",
            "data" => []
         ];

    }


    private function upsert(
        UpsertBookRequest $request,
        Book $book
    ): Book
    {
        $bookData = BookData::fromRequest($request);
        return $this->upsertBookAction->execute($bookData, $book);
    }
}
