@extends('layout')

@section('content')
    <h2><a href="{{ route("umastagram.show", ['horse' => $horse->id]) }}">{{ $horse->name }}</a>の写真</h2>
    <img src="https://umastagram.s3.ap-northeast-1.amazonaws.com/{{ $picture->image_path }}">
    <h5>{{ $picture->comment }}</h5>
    <p>{{ $picture->user->name }}</p>
    <p>{{ $picture->created_at->format('Y年m月d日') }}</p>
    
    <a href="{{ route("umastagram.edit_picture", ['horse' => $horse->id, 'picture' => $picture->id]) }}">編集</a>
@endsection