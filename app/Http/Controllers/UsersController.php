<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Book;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $book_likes = $user->like_books()->orderBy('created_at','desc')->paginate(25);
        
        $reviews = $user->review_user()->orderBy('created_at', 'desc')->paginate(25);
        
        return view('users.show',
        [
            'user' => $user,
            'book_likes' => $book_likes,
            'reviews' => $reviews,
        ]);
    }
    
    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
        
    //     return view('users.edit',[
    //         'user' => $user,
    //     ]);
    // }
    
    // public function update(Request $request,$id)
    // {
    //     $user = User::findOrFail($id);
        
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     // $user->password = $request->password;
    //     $user->save();
        
    //     return redirect('/');
    // }
    
}
