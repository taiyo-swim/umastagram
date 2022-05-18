@extends('layout')

@section('content')
    
    <div class="horse_information">
        <h1>馬名：{{ $horse->name }}</h1><h4>{{ $horse->sex }}</h4><h4>({{ $horse->color }})</h4>
        <h3>父：{{ $horse->father_name }}</h3>
        <h3>母：{{ $horse->mother_name }}</h3><h5>(母父：{{ $horse->mothers_father_name }})</h5>
        <h3>馬主：<a href='{{ route("umastagram.search", ['owner_keyword' => $horse->owner]) }}'>{{ $horse->owner }}</a></h3>
        <h3>調教師：({{ $horse->belong }}) <a href='{{ route("umastagram.search", ['trainer_keyword' => $horse->trainer]) }}'>{{ $horse->trainer }}</a></h3>
        <h3>生産者：<a href='{{ route("umastagram.search", ['producer_keyword' => $horse->producer]) }}'>{{ $horse->producer }}</a></h3>
        <h3>生年月日：{{ $horse->birthday }}</h3>
        <h3>主な勝ち鞍：{{ $horse->winning }}</h3>
        <h3>通算成績：{{ $horse->total_result }}</h3>
        <h3><a href='{{ $horse->netkeiba_url }}'>競争成績の詳細</h3>
    </div>
    
    @can('admin') <!--管理者のみ表示-->
        <a href='{{ route("umastagram.edit", ['horse' => $horse->id]) }}'>編集</a>
        <form action="/horse/{{ $horse->id }}" id="horse_information_delete" method="post">
            @csrf
            @method('DELETE')
            <h5><button onclick="return confirm('本当に削除しますか？')" action="submit">削除</button></h5>
        </form>
    @endcan
    
    <div class="horse_pictures">
        @foreach($horse_pictures as $horse_picture)
            @if($horse_picture->image_path)
                <a href='{{ route("umastagram.show_picture", ['horse' => $horse->id, 'picture' => $horse_picture->id]) }}'>
                    <img src="https://umastagram.s3.ap-northeast-1.amazonaws.com/{{ $horse_picture->image_path }}">
                </a>
            @endif
        @endforeach
    </div>
    <a href='{{ route("umastagram.create_picture", ['horse' => $horse->id]) }}'>写真の投稿</a>
    <a href='{{ route("umastagram.top") }}'>トップページへ</a>
    
@endsection