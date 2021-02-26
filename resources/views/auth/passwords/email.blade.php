@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

<div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <h1 class="text-center"><a class="text-dark text-title" href="/"><i class="fas fa-book-open mr-1"></i>FavoBook</a></h1>
                <div class="card mt-3">
                    <div class="card-body text-center">
                    <h2 class="h3 card-title text-center mt-2 log-regi-title">パスワード再設定</h2>
                    
                    @include('error_card_list')
                    
                    @if (session('status'))
                      <div class="card-text alert alert-success">
                        {{ session('status') }}
                      </div>
                    @endif
                    
                        <div class="card-text">
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="md-form">
                                    <label for="email">メールアドレス</label>
                                    <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
                                </div>
                                
                                <button class="btn btn-block bg-success mt-2 mb-2 log-regi-btn" type="submit" style="color:#FFF;">メール送信</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection