@extends('layouts.app')

@section('title', 'ユーザー詳細画面')

@section('content')

@include('commons.nav')

    <div class="container">
        <h2 class="title_text">プロフィール</h2>
            <div class="pro_img">
                <img class="proimg_size" src="{{ Gravatar::get($user->email) }}" alt=""> 
            </div>
        <h3 class="pro_nickname">{{ $user->nickname}}</h3>
        <h5 class="pro_name">＠{{ $user->name}}</h5>
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
            &nbsp;

        <ul class="nav nav-tabs nav-pills nav-justified mb-3 " id="myTab" role="tablist">
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                お気に入り（{{ $user->like_books_count}}）
                </a>
            </li>
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                レビュー （{{ $user->review_user_count}}）
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @if (count($book_likes) > 0)
                    <div class="book-likes">
                        <div class="row">
                            @foreach ($book_likes as $book_like)
                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 book">
                                    <div class="card text-center">
                                        <div class="like_books_img">
                                            <img class="card-img-top" src="{{ $book_like->img_url }}" alt="書籍画像">
                                        </div>
                                        <div class="card-body popular-caption">
                                            <h4><a class="card-title" href="/books/{{ $book_like->id }}" class="title_content">{{ $book_like->title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- ページネーションのリンク --}}
                            {{ $book_likes->links() }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @if (count($reviews) > 0)
                    @foreach ($reviews as $review)
                        <div class="card mt-4">
                            <div class="card-body d-flex flex-row">
                                <div class="review-book-img">
                                    <img src="{{ $review->book->img_url }}" alt="書籍画像" style=''>
                                </div>
                                <div class="card-body popular-caption">
                                    <h5><a class="card-title" href="/books/{{ $review->book_id }}" class="title_content">{{ $review->book->title }}</a></h5>
                                </div>
                            </div>
                            <hr class="border">
                            <div class="card-body d-flex flex-row">
                                <i class="fas fa-user-circle fa-3x mr-1"></i>
                                <div>
                                    <div class="font-weight-bold">
                                        <h5 class="user-name">
                                            {{$review->user->nickname }}
                                            <span class="pro_name">&nbsp;＠{{$review->user->name}}</span>
                                        </h5>
                                        <span class="star5_rating" data-rate="{{ $review->stars }}"></span>
                                        &nbsp;
                                        &nbsp;
                                        <span class="text-muted">投稿日 : {{ $review->created_at->format('Y年m月d日 H時i分') }}</span>
                                    </div>
                                    <div class="card-body pt-0 pb-2">
                                        <div class="card-text">
                                            <p class="mt-2">{{ $review->comment}}</p>
                                        </div>
                                    </div>
                                    @if (Auth::id() == $review->user_id)
                                        {{-- 投稿削除ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['books.destroy', $review->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('削除', ['class' => 'btn btn-danger delete_btn btn-sm']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                     @endforeach
                {{-- ページネーションのリンク --}}
                {{ $reviews->links() }}
                @endif
            </div>
        </div>
    </div>
    
@endsection