@extends('layouts.app')

@section('title', '書籍一覧')

@section('content')

@include('commons.nav')

    <div class="search-box">
        ︎<h2><i class="fas fa-search" @click="openModal"></i></h2>
    </div>
    <search-form @pass-value="search"></search-form>
    <!--結果一覧の表示のコンポーネント -->
    <search-result :search-text="searchText"></search-result>
    
    
@endsection