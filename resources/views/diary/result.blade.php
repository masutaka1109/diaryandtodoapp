@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="{{asset('css/diary_index.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection

@section('content')
@include('commons.kensaku')
<div class="result-area">
    <h3>{{ $diaries_count }}件の検索結果が見つかりました。</h3>
    @include('commons.diaries')
    {{ $diaries->appends(array('keyword'=>$keyword))->links() }}
</div>
@endsection