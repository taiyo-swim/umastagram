@extends('layout')

@section('content')
    <h3>{{ $horse->name }}の写真投稿</h3>
    <form action="/horse/{{ $horse->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="horse_image" value="{{ old('horse_id') }}"/>
        <textarea name="comment" placeholder="コメントを入力してください">{{ old('comment') }}</textarea>
        <input type="submit" value="アップロード">
    </form>
    <a href='{{ route("umastagram.show", ['horse' => $horse->id]) }}'>{{ $horse->name }}のページへ</a>
    
@endsection