@extends('layout')

@section('content')
    <div class="horse_search">
        <!--↓↓ 検索フォーム ↓↓-->
            <form  class="search_form" method="get" action="/horses/search">
            @csrf
                <input type="text" name="horse_name_keyword" class="search-box" placeholder="馬名">
                <button type="submit" class="search_button">検索</button>
            </form>
        <!--↑↑ 検索フォーム ↑↑-->
    </div>
    
    <div class="search-count">
        @if ($keyword != null)
            <h5>{{ $keyword }}の検索結果：{{ $count }}頭</h5>
        @endif
    </div>
    
    <div class="search_horse_list">
        @foreach($horses as $horse)
            <h2><a href="{{ route("umastagram.show", ['id' => $horse->id]) }}">{{ $horse->name }}</a></h2>
        @endforeach
    </div>
    <a href='{{ route("umastagram.top") }}'>トップページへ</a>
@endsection