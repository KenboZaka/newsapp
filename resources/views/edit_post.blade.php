@extends('layouts.master')

@section('title', 'post_detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tab">
                    <ul>
                    <li>{{$post->content}}</li>
                    </ul>
                </div>
                <form action="/update/{{$post->id}}" method="post">
                    @csrf
                    <label for="content">Post投稿内容</label>
                <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea>
                    <input type="submit" value="投稿する">
                </form>
                <a href="/article">一覧に戻る</a>
                
                {{-- @foreach($post->comments as $comment)
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$comment->content}}</p>
                        <form action="/delete/{{$comment->id}}" method="post">
                            @csrf
                            <input type="submit" value="コメント削除" class="btn btn-danger">
                        </form>
                            <a class="btn btn-success" href="/edit/{{$post->id}}/{{$comment->id}}">編集する</a>
                    </div>
                </div>
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection