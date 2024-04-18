<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" =>  fake()->name(),
	        "isbn" =>  "978-0553103540",
	        "authors" =>  [
		        "George R. R. Timothy samuel"
	        ],
	        "numberOfPages" =>  694,
	        "publisher" =>  "Bantam Books",
	        "country" =>  "United States",
	        "released" =>  "1996-08-01T00:00:00"

        ];
    }
}
