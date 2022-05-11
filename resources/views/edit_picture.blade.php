@extends('layout')

@section('content')
    <h3>{{ $horse->name }}の写真編集</h3>
    <form action="/horse/{{ $horse->id }}/update/{{ $picture->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="file" name="horse_image">{{ old('horse_image', $picture->image_path) }}</input>
        @error('horse_image')
            <p class="error" style="color: red;">{{$message}}</p>
        @enderror
        
        <textarea name="comment">{{ old('comment', $picture->comment) }}</textarea>
        @error('comment')
            <p class="error" style="color: red;">{{$message}}</p>
        @enderror
        <input type="submit" value="アップデート">
    </form>
    <a href='{{ route("umastagram.show_picture", ['horse' => $horse->id, 'picture' => $picture->id]) }}'>写真のページへ戻る</a>
    
@endsection