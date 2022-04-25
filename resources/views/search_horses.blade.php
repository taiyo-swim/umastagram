@extends('layout')

@section('content')
    <div class="search-count">
        @if ($keyword != null)
            <h5>{{ $keyword_item }}:{{ $keyword }}の検索結果：{{ $count }}頭</h5>
        @endif
    </div>
    
    <div class="search_horse_list">
        @foreach($horses as $horse)
            <h2><a href="{{ route("umastagram.show", ['id' => $horse->id]) }}">{{ $horse->name }}</a></h2>
            <h3>父：{{ $horse->father_name }}</h3>
            <h3>母：{{ $horse->mother_name }}</h3>
        @endforeach
    </div>
    <a href='{{ route("umastagram.top") }}'>トップページへ</a>
    
@endsection