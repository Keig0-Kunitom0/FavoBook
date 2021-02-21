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
        
        return view('users.show',
        [
            'user' => $user,
            'book_likes' => $book_likes,
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
    
    public function like_books($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $book_likes = $user->like_books()->orderBy('created_at', 'desc')->paginate(25);

        // お気に入り一覧ビューでそれを表示
        return view('users.like_books', 
        [
            'user' => $user,
            'book_likes' => $book_likes,
        ]);
    }
}
