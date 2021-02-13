@extends('layouts.app')

@section('title', '書籍一覧')

@section('content')

@include('commons.nav')
    <!--結果一覧の表示のコンポーネント -->
    <search-result :search-text="searchText"></search-result>
@endsection