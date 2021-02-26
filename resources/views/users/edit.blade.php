@extends('layouts.app')

@section('title', 'プロフィール編集画面')

@section('content')

@include('commons.nav')

<div class="container my-5">
    <div class="mx-auto col-md-7">
        <div class="card">
            <h2 class="h4 card-header text-center navbar-dark bg-success text-white log-regi-title">プロフィール編集</h2>
            <div class="card-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group text-center">
                        <label for="profile_image">
                            <p class="mb-1">プロフィール画像</p>
                        </label>
                    <div class="pro_img">
                        <a href="https://ja.gravatar.com/"><img class="proimg_size" src="{{ Gravatar::get($user->email) }}" alt="">
                            <span class="word">編集</span>
                        </a>
                    </div>
                </div>
                
                @include('error_card_list') 
                
                <div class="form-group">
                    {!! Form::label('nickname', 'ニックネーム') !!}
                    <small class="blue-grey-text">（20文字以内）</small>
                    {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('self_introduction', '自己紹介文') !!}
                    <small class="blue-grey-text">（200文字以内）</small>
                    {!! Form::textarea('self_introduction', null, ['class' => 'form-control']) !!}
                </div>
                <div class="edit-bton">
                    {!! Form::submit('更新', ['class' => 'btn btn-success update_btn']) !!}
                </div>
                <a href="{{ route('users.edit_password', ['user' => $user->id]) }}">パスワード変更はこちら</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection