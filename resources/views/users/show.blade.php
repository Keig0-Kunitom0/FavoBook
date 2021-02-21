@extends('layouts.app')

@section('title', 'ユーザー詳細画面')

@section('content')

@include('commons.nav')

<div class="container">
    <h2 class="title_text">プロフィール</h2>
    <div class="pro_img">
        <img class="proimg_size" src="{{ Gravatar::get($user->email) }}" alt=""> 
    </div>
    <h3 class="pro_name">ユーザーネーム</h3>
    <div class="pro_follow">
          <a href="" class="text-muted">
            フォロー 10 
          </a>
          &nbsp;
          &nbsp;
          <a href="" class="text-muted">
            フォロワー 10 
          </a>
    </div>
    <h4>&nbsp;</h4>
    <ul class="nav nav-tabs nav-justified mb-3">
        <li class="nav-item">
            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                お気に入り
                <span class="badge badge-success">{{ $user->like_books_count }}</span>
            </a>
        </li>
        <li class="nav-item"><a href="#" class="nav-link">レビュー</a></li>
    </ul>
            
    <!--<div class="">-->
    <!--    <ul class="nav nav-tabs nav-justified mb-3">-->
    <!--        {{-- お気に入り一覧タブ --}}-->
    <!--        <li class="nav-item">-->
    <!--            <h2 class="heading">お気に入り一覧<span class="badge badge-secondary">{{ $user->like_books_count }}</span></h2>-->
    <!--        </li>-->
    <!--    </ul>-->
    <!--    {{-- お気に入り一覧 --}}-->
    <!--    @include('users.like_books')-->
    <!--</div>-->
</div>
@endsection