<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\User;
use App\BookReview;

class BooksController extends Controller
{
    public function books () {
        return view('welcome');
    }
    
    public function show ($id) {
        
        $book = Book::findOrFail($id);
        
        $book->loadRelationshipCounts();
        
        $stars = $book->review_book()->avg('stars');
        
        $avg_score = round($stars,1);
        
        $avg_percentage = $avg_score*100/5;
        
        
        $reviews = $book->review_book()->orderBy('created_at', 'desc')->paginate(25);
        
        return view('books.show',[
            'book' => $book,
            'reviews' => $reviews,
            'avg_score' => $avg_score,
            'avg_percentage' => $avg_percentage,
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
    
    public function store(Request $request) {

        $result = false;

        // バリデーション
        $request->validate([
            'bookid' => [
                'required',
                'exists:books,id',
                function($attribute, $value, $fail) use($request) {

                    // すでにレビュー投稿してるかチェック
                    $exists = \App\BookReview::where('user_id', Auth::id())
                        ->where('book_id', $request->bookid)
                        ->exists();

                    if($exists) {

                        $fail('すでにレビューは投稿済みです。');
                        return;

                    }

                }
            ],
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'bookimg' => 'required',
            'booktitle' => 'required'
        ]);

        $review = new \App\BookReview();
        $review->book_id = $request->bookid;
        $review->user_id = Auth::id();
        $review->stars = $request->star;
        $review->comment = $request->comment;
        $review->title = $request->booktitle;
        $review->img_url = $request->bookimg;
        $result = $review->save();
        
        return back();

    }
    
    public function destroy($id) {
        
        $review = BookReview::findOrFail($id);
        $review->delete();
        
        return back();
    }
    
}
