@extends('layouts.app')

@section('title', '書籍詳細画面')

@section('content')

@include('commons.nav')
        
        <div class="container">
                <h2 class="title_text">書籍詳細</h2>
            <hr class="border">
                <h5>&nbsp;</h5>
                
                <div class="row">
                    <div class="col-lg-6 book-img">
                        <img src="{{ $book->img_url }}" alt="書籍画像" style=''>
                        <h5>&nbsp;</h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="small-content">
                            <h1>{{ $book->title }}</h1>
                            <div class="average-score">
                                <div class="star-rating">
                                    <div class="star-rating-front" style="width:{{ $avg_percentage }}%">★★★★★</div>
                                    <div class="star-rating-back">★★★★★</div>
                                </div>
                                <div class="average-score-display">
                                    <h4>({{ $book->review_book_count }})</h4>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="border">
                        <div class="small-content">
                            <h3>著者／編集 : &nbsp;{{ $book->author }}</h3>
                        </div>
                        <div class="small-content">
                            <h3>出版社 : &nbsp;{{ $book->publisher }}</h3>
                        </div>
                        <div class="small-content">
                            <h3>発売日 : &nbsp;{{ $book->release_date }}</h3>
                        </div>
                        <hr class="border">
                        <book-like
                        :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($book->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('books.like', ['book' => $book]) }}"
                        >
                        </book-like>
                        <hr class="border">
                        <u class="content_url">
                            <h4><a href="{{ $book->affiliate }}"><i class="fas fa-arrow-right"></i>楽天ブックスで購入する</a></h4>
                        </u>
                        
                    </div>
                </div>
            <hr class="border">
                <h2 class="title_text">この本のレビュー</h2>
                @auth
                <div class="review-btn">
                    <button class="btn" data-toggle="modal" data-target="#modal-example" style="color:#FFF;">
                      レビューを投稿する
                   </button>
               </div>
                <div class="error-preview">
                    @include('error_card_list')
                </div>
                  <!-- 2.モーダルの配置 -->
            <div class="modal" id="modal-example" tabindex="-1">
                  <div class="modal-dialog">
                        <!-- 3.モーダルのコンテンツ -->
                        <div class="modal-content">
                            <!-- 4.モーダルのヘッダ -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="modal-label">レビューの投稿</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <!-- 5.モーダルのボディ -->
                            <form  method="POST" action="{{ route('books.store') }}">
                                 @csrf
                                <input type="hidden" name="bookid" value="{{ $book->id }}">
                                <div class="modal-body">
        
                                    <div class="modal-star">スター</div>
                                        <h5>
                                            <div>
                                                <input type="radio" name="star" value="5" checked>
                                                <span class="star5_rating" data-rate="5"></span>
                                            </div>
                                            <div>
                                                <input type="radio"  name="star" value="4">
                                                <span class="star5_rating" data-rate="4"></span>
                                            </div>
                                            <div>
                                                <input type="radio"  name="star" value="3">
                                                <span class="star5_rating" data-rate="3"></span>
                                            </div>
                                            <div>
                                                <input type="radio" name="star" value="2">
                                                <span class="star5_rating" data-rate="2"></span>
                                            </div>
                                            <div>
                                                <input type="radio" name="star" value="1">
                                                <span class="star5_rating" data-rate="1"></span>
                                            </div>
                                        </h5>
                                    <p>コメント<br>
                                    <textarea class='modal-comments' name='comment'></textarea>
                                    </p>
                                    <input type="hidden" name="bookimg" value="{{ $book->img_url }}">
                                    <input type="hidden" name="booktitle" value="{{ $book->title }}">
                                    
                                </div>
                                <!-- 6.モーダルのフッタ -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn bg-success" style="color:#FFF;">保存</button>
                                </div>
                            </form>
                            </div>
                      </div>
                  </div>
                @endauth

                @include('books.review')
            </div>
        </div>
@endsection