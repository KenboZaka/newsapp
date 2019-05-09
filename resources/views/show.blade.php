@extends('layouts.master')

@section('title', 'detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tab">
                    <ul>
                        <li>{{$article->title}}</li>
                        <li>{{$article->content}}</li>
                    </ul>
                </div>
                <form action="/post/{{$article->id}}" method="post">
                    @csrf
                    <label for="content">投稿内容</label>
                    <textarea name="content" cols="30" rows="10"></textarea>
                    <input type="submit" value="投稿する">
                </form>
                <a href="/article">一覧に戻る</a>
                <div>
                    @foreach($article->posts as $post)
                <p><a href="/detail/{{$post->id}}">{{$post->content}}</a></p>
                <form action="/delete/{{$post->id}}" method="post">
                    @csrf
                    <input type="submit" value="Postコメント削除" class="btn btn-danger">
                </form>
                    <a class="btn btn-success" href="/edit/{{$post->id}}">Post編集する</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection