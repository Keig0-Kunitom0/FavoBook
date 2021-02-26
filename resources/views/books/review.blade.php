@if (count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach ($reviews as $review)
            <div class="card mt-3">
                <div class="card-body d-flex flex-row">
                    <div class="pro_img_short">
                        <img class="proimg_size_short" src="{{ Gravatar::get($review->user->email) }}" alt=""> 
                    </div>
                        <div>
                            <div class="font-weight-bold mt-2">
                                <h5 class="user-name">
                                    {!! link_to_route('users.show', $review->user->nickname,['user' => $review->user->id]) !!}
                                    <span class="pro_name">&nbsp;＠{{$review->user->name}}</span>
                                </h5>
                                <span class="star5_rating" data-rate="{{ $review->stars }}"></span>
                                &nbsp;
                                &nbsp;
                                <span class="text-muted">投稿日 : {{ $review->created_at->format('Y年m月d日 H時i分') }}</span>
                            </div>
                            <div class="card-body pt-0 pb-2">
                                {{-- 投稿内容 --}}
                                <div class="card-text">
                                    <p class="mt-2">{!! nl2br(e($review->comment)) !!}</p>
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
    </ul>
        <div class="d-flex justify-content-center pagenaition">
            {{ $reviews->links('pagination::sample-pagination') }}
        </div>
@else
    <h5 class="heading">レビューはありません。</h3>
@endif