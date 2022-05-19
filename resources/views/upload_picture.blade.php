@extends('layout')

@section('content')
    <h3>{{ $horse->name }}の写真投稿</h3>
    <form action="/horse/{{ $horse->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="horse_image" value="{{ old('horse_image') }}"/>
        @error('horse_image')
            <p class="error" style="color: red;">{{$message}}</p>
        @enderror
        
        <textarea name="comment" placeholder="コメントを入力してください">{{ old('comment') }}</textarea>
        @error('comment')
            <p class="error" style="color: red;">{{$message}}</p>
        @enderror
        <input type="submit" value="アップロード">
    </form>
    <a href='{{ route("umastagram.show", ['horse' => $horse->id]) }}'>{{ $horse->name }}のページへ</a>
    
@endsection