@extends('layouts.app')

@section('title', '書籍詳細画面')

@section('content')

@include('commons.nav')

    <div class="directory-details pt-padding">
        <h2 class="title_text">書籍詳細</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ $book->img_url }}" alt="書籍画像" style=''>
                    </div>
                    <div class="col-md-6">
                        <div class="small-content">
                            <h1>{{ $book->title }}</h1>
                        </div>
                        <hr class="border">
                        <div class="small-content">
                            <h2>{{ $book->author }}</h2>
                        </div>
                        <div class="small-content">
                            <h2>{{ $book->publisher }}</h2>
                        </div>
                        <div class="small-content">
                            <h2>{{ $book->release_date }}</h2>
                        </div>
                        <hr class="border">
                        <u class="content_url">
                            <h2><a href="{{ $book->affiliate }}"><i class="fas fa-arrow-right"></i>楽天ブックスで購入する</a></h2>
                        </u>
                        <book-like
                        :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($book->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('books.like', ['book' => $book]) }}"
                        >
                            
                        </book-like>
                        <hr class="border">
                    </div>
                </div>
            </div>
    </div>
@endsection