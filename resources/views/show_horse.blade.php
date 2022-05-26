@extends('layout')

@section('content')
    <div class="horse_name">
        <h1>{{ $horse->name }}</h1>
        <p>{{ $horse->sex }}&emsp;{{ $horse->color }}</p>
    </div>
    
    <table id="horse_information">
        <tr>
            <th id=father_name>父</th>
            <td>{{ $horse->father_name }}</td>
        </tr>
        <tr>
            <th id=mother_name>母</th>
            <td>{{ $horse->mother_name }}<br><span style="font-size: 80%;">母父：{{ $horse->mothers_father_name }}</span></td>
        </tr>
        <tr>
            <th>馬主</th>
            <td><a href='{{ route("umastagram.search", ['owner_keyword' => $horse->owner]) }}'>{{ $horse->owner }}</a></td>
        </tr>
        <tr>
            <th>調教師</th>
            <td>({{ $horse->belong }}) <a href='{{ route("umastagram.search", ['trainer_keyword' => $horse->trainer]) }}'>{{ $horse->trainer }}</a></td>
        </tr>
        <tr>
            <th>生産者</th>
            <td><a href='{{ route("umastagram.search", ['producer_keyword' => $horse->producer]) }}'>{{ $horse->producer }}</a></td>
        </tr>
        <tr>
            <th>生年月日</th>
            <td>{{ $horse->birthday }}</td>
        </tr>
        <tr>
            <th>主な勝ち鞍</th>
            <td>{{ $horse->winning }}</td>
        </tr>
        <tr>
            <th>通算成績</th>
            <td>{{ $horse->total_result }}</td>
        </tr>
    </table>
        <h3><a href='{{ $horse->netkeiba_url }}'>競争成績の詳細</h3>
    
    @can('admin') <!--管理者のみ表示-->
        <a href='{{ route("umastagram.edit", ['horse' => $horse->id]) }}'>編集</a>
        <form action="/horse/{{ $horse->id }}" id="horse_information_delete" method="post">
            @csrf
            @method('DELETE')
            <h5><button onclick="return confirm('本当に削除しますか？')" action="submit">削除</button></h5>
        </form>
    @endcan
    
    <div id="horse_pictures">
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