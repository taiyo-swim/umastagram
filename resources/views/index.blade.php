@extends('layout')

@section('content')
    <h1>umastagramへようこそ！</h1>
    <div class="horse_search">
        <!--↓↓ 検索フォーム ↓↓-->
            <form  class="search_form" method="get" action="/horses/search">
            @csrf
                <input type="text" name="horse_name_keyword" class="search-box" placeholder="馬名">
                <button type="submit" class="search_button">検索</button>
            </form>
        <!--↑↑ 検索フォーム ↑↑-->
    </div>
    <h3><a href='{{ route("umastagram.create") }}'>競走馬情報の登録</a></h3>
@endsection