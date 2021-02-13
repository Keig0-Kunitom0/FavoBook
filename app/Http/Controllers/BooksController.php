<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function books () {
        return view('welcome');
    }
    
    public function show ($id) {
        
        $book = Book::findOrFail($id);
        
        return view('books.show',[
            'book' => $book,
        ]);
    }
}
