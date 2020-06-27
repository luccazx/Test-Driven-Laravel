<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller
{
    public function store()
    {
        Book::create($this->validateRequest());
    }

    /**
     * @param Book $book
     */
    public function update(Book $book){
        $data = $this->validateRequest();

        Book::where('id', $book->id)->update($this->validateRequest());
    }

    /**
     * @return array
     */
    protected function validateRequest(): array
    {
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
        return $data;
    }
}
