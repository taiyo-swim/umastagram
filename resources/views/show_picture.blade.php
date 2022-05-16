@extends('layout')

@section('content')
    <h2><a href="{{ route("umastagram.show", ['horse' => $horse->id]) }}">{{ $horse->name }}</a>の写真</h2>
    <img src="https://umastagram.s3.ap-northeast-1.amazonaws.com/{{ $picture->image_path }}">
    <h5>{{ $picture->comment }}</h5>
    <p>{{ $picture->user->name }}</p>
    <p>{{ $picture->created_at->format('Y年m月d日') }}</p>
    
    @can('update_picture', $picture)  <!--投稿したユーザー以外には表示されない-->
        <a href="{{ route("umastagram.edit_picture", ['horse' => $horse->id, 'picture' => $picture->id]) }}">編集</a>
    @endcan
    
    @can('delete_picture', $picture)  <!--投稿したユーザー以外には表示されない-->
        <form action="/horse/{{ $horse->id }}/{{ $picture->id }}" id="picture_delete" method="post">
            @csrf
            @method('DELETE')
            <h5><button onclick="return confirm('本当に削除しますか？')" action="submit">写真を削除</button></h5>
        </form>
    @endcan
@endsection