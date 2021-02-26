@extends('layouts.app')

@section('title', 'フォロ一覧画面')

@section('content')

@include('commons.nav')
    <div class="container">
        <h2 class="title_text">フォロー中</h2>
        <hr class="border">
        @if (count($followings) > 0)
            @foreach ($followings as $user)
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-dark">
                                <div class="pro_img_short">
                                    <img class="proimg_size_short" src="{{ Gravatar::get($user->email) }}" alt=""> 
                                </div>
                            </a>
                            <h2 class="h5 card-title mt-2">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-dark">
                                    {{ $user->nickname }}
                                </a>
                                <span class="pro_name">&nbsp;＠{{$user->name}}</span>
                            </h2>
                            @if (Auth::id() != $user->id)
                                @if (Auth::user()->is_following($user->id))
                                <div class="unfollow-button-1">
                                    {{-- アンフォローボタンのフォーム --}}
                                    {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                        {!! Form::button('<i class="fas fa-user-check"> &nbsp;フォロー中</i>', ['class' => "btn shadow-none p-2",'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </div>
                                @else
                                <div class="follow-button-1">
                                    {{-- フォローボタンのフォーム --}}
                                    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                        {!! Form::button('<i class="fas fa-user-plus"> &nbsp;フォロー</i>', ['class' => "btn shadow-none p-2",'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                 </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                                フォロー&nbsp; {{ $user->followings->count() }}
                            &nbsp;
                            &nbsp;
                                フォロワー&nbsp; {{ $user->followers->count() }}
                        </div>
                    </div>
                </div>
            @endforeach
            <hr class="border">
            <div class="d-flex justify-content-center pagenaition">
                {{ $followings->links('pagination::sample-pagination') }}
            </div>
        @endif
    </div>
    <h1> &nbsp;</h1>
@endsection