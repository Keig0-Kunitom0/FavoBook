@if (count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach ($reviews as $review)
            <div class="card mt-3">
                <div class="card-body d-flex flex-row">
                    <i class="fas fa-user-circle fa-3x mr-1"></i>
                        <div>
                            <div class="font-weight-bold">
                                ユーザー名
                                <span class="star5_rating" data-rate="{{ $review->stars }}"></span>
                                &nbsp;
                                &nbsp;
                                <span class="text-muted">投稿日 : {{ $review->created_at->format('Y年m月d日 H時i分') }}</span>
                            </div>

                            <div class="card-body pt-0 pb-2">
                                {{-- 投稿内容 --}}
                                <div class="card-text">
                                <p class="mt-2">{!! nl2br(e($review->comment)) !!}</p>
                                 @if (Auth::id() == $review->user_id)
                                    {{-- 投稿削除ボタンのフォーム --}}
                                    {!! Form::open(['route' => ['books.destroy', $review->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('削除', ['class' => 'btn btn-danger delete_btn']) !!}
                                    {!! Form::close() !!}
                                @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        @endforeach
        
        {{-- ページネーションのリンク --}}
        {{ $reviews->links() }}
    </ul>
@else
    <h3 class="heading">この本のレビューはありません。</h3>
@endif