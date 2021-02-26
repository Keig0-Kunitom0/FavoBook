<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Session;

use App\User;
use App\Book;
use App\BookReview;

class UsersController extends Controller
{  
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
    
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $book_likes = $user->like_books()->orderBy('created_at','desc')->paginate(50);
        
        $reviews = $user->review_user()->orderBy('created_at', 'desc')->paginate(50);
        
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
        $followings = $user->followings()->paginate(50);

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
        $followers = $user->followers()->paginate(50);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.edit',[
            'user' => $user,
        ]);
    }
    
    public function update(UserRequest $request,$id)
    {
        $user = User::findOrFail($id);
        
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->self_introduction = $request->self_introduction;
        $user->save();
        
        return redirect()->route('users.show',['user' => $user->id]);
    }
    
    public function edit_password($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit_password', ['user' => $user]);
    }

    public function update_password(UpdatePasswordRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        session()->flash('msg_success', 'パスワードを更新しました');
        return redirect()->route('users.show',['user' => $user->id]);
    }
}
