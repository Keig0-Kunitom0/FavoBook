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
    
     public function like(Request $request, Book $book)
    {
        $book->like_users()->detach($request->user()->id);
        $book->like_users()->attach($request->user()->id);

        return [
            'id' => $book->id,
            'countLikes' => $book->count_likes,
        ];
    }

    public function unlike(Request $request, Book $book)
    {
        $book->like_users()->detach($request->user()->id);

        return [
            'id' => $book->id,
            'countLikes' => $book->count_likes,
        ];
    }
}
