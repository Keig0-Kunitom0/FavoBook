<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Book;
use App\BookReview;

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
    
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(25);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }
    
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(25);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
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
