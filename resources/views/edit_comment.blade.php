@extends('layouts.master')

@section('title', 'post_detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
            <form action="/update/{{$post->id}}/{{$comment->id}}" method="post">
                    @csrf
                    <label for="content">投稿内容</label>
                    <textarea name="content" cols="30" rows="10">{{$comment->content}}</textarea>
                    <input type="submit" value="編集する">
                </form>
            </div>
        </div>
    </div>
@endsection