@if (count($book_likes) > 0)
    <div class="directory-details pt-padding">
        <div class="favorite_contents">
            <div class="container">
                <div class="row">
                    @foreach ($book_likes as $book_like)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="gallery-img_1">
                                    <img src="{{ $book_like->img_url }}" alt="書籍画像">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 favorite_title">
                        <h2><a href="/books/{{ $book_like->id }}" class="title_content">{{ $book_like->title }}</a></h2>
                    </div>
                    @endforeach
                    
                    {{-- ページネーションのリンク --}}
                    {{ $book_likes->links() }}
                </div>
            </div>
        </div>
    </div>
@endif