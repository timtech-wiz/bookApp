<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpsertBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "min:3", "max:20", Rule::unique('books')->ignore(request('book'))],
            "isbn" => ["required"],
            "authors" => ["required","array"],
            "country" => ["required"],
            "numberOfPages" => ["required", "numeric"],
            "publisher" => ["required"],
            "released" => ["required", "date"]
        ];
    }
}
