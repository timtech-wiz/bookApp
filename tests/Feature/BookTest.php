<?php

use App\Models\Book;
 
test('it should return 422 in the name is invalid', function (?string $name) {
    Book::factory([
        'name' => 'A Game of Thrones'
    ])->create();
    $this->postJson(route('book.store'), [
    "name" => $name,
	"isbn" => "978-0553103540",
	"authors" => [
		"George R. R. Martin"
	],
	"numberOfPages" => 694,
	"publisher" => "Bantam Books",
	"country" => "United States",
	"released" => "1996-08-01T00:00:00"
])
->assertInvalid(['name']);
})->with([
    '',
    null,
    'A Game of Thrones'
]);