@if (count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach ($reviews as $review)
            <li class="media mb-5">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                
                <div class="media-body">
                    <div class="name_color">
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        
                    </div>
                    <div class="row">
                        {{-- 投稿内容 --}}
                        <div class="col-md-6">
                        <span class="star5_rating" data-rate="{{ $review->stars }}"></span>
                        <p class="mb-2">{!! nl2br(e($review->comment)) !!}</p>
                        @if (Auth::id() == $review->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['books.destroy', $review->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger delete_btn']) !!}
                            {!! Form::close() !!}
                        @endif
                        </div>
                    </div>
                </div>
            </li>
            <hr class="border">
        @endforeach
        
        {{-- ページネーションのリンク --}}
        {{ $reviews->links() }}
    </ul>
@else
    <h3 class="heading">この本のレビューはありません。</h3>
@endif