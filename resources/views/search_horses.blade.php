@extends('layout')

@section('content')
    <div class="search-count">
        @if ($keyword != null)
            <h4>競走馬検索&nbsp;:&nbsp;{{ $keyword_item }}「{{ $keyword }}」</h4>
            <h5>検索結果&nbsp;:&nbsp;{{ $count }}頭</h5>
        @endif
    </div>
    
    <div class="search_horse_list">
        @foreach($horses as $horse)
            <h3><a href="{{ route("umastagram.show", ['horse' => $horse->id]) }}">{{ $horse->name }}</a></h3>
            <h4>{{ $horse->sex }}&nbsp;<span id="birthday">{{ $horse->birthday }}</span>&emsp;{{ $horse->total_result }}</h4>
            <h4>父&nbsp;:&nbsp;{{ $horse->father_name }}</h4>
            <h4>母&nbsp;:&nbsp;{{ $horse->mother_name }}</h4>
        @endforeach
    </div>
    <a href='{{ route("umastagram.top") }}'>トップページへ</a>
    
    
    
    
    
    <script> {{--生年月日を年だけ表示するプログラム--}}
        var str = document.getElementById("birthday").innerHTML;
        str = str.substring(0,5); {{--0－5までの文字を抜き出す--}}
        document.getElementById("birthday").innerHTML = str;
    </script>
@endsection