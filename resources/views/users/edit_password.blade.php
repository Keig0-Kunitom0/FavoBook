@extends('layouts.app')

@section('title', 'パスワード編集画面')

@section('content')

@include('commons.nav')

<div class="container my-5">
    <div class="mx-auto col-md-5">
        <div class="card">
            <h2 class="h4 card-header text-center navbar-dark bg-success text-white log-regi-title">パスワード編集</h2>
            <div class="card-body">
                
                {!! Form::model($user, ['route' => ['users.update_password', $user->id], 'method' => 'put']) !!}
                
                @include('error_card_list') 
                &nbsp;
                <div class="form-group">
                    {!! Form::label('current_password', '現在のパスワード') !!}
                    &nbsp; &nbsp;
                    {!! Form::password('current_password', null, ['class' => 'form-control']) !!}
                </div>
                 &nbsp;
                <div class="form-group">
                    {!! Form::label('new_password', '新しいパスワード') !!}
                    &nbsp; &nbsp;
                    {!! Form::password('new_password', null, ['class' => 'form-control']) !!}
                </div>
                 &nbsp;
                <div class="form-group">
                    {!! Form::label('new_password_confirmation', 'パスワードを確認') !!}
                    &nbsp; &nbsp;
                    {!! Form::password('new_password_confirmation', null, ['class' => 'form-control']) !!}
                </div>
                 &nbsp;
                <div class="edit-bton">
                    {!! Form::submit('更新', ['class' => 'btn btn-success update_btn']) !!}
                </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection