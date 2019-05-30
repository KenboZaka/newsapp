@extends('layouts.master')

@section('title', 'user_posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                    <div class="card-header">
                        <p class="py-1 m-0">名前：{{$user->name}} さんの投稿一覧</p>
                    </div>
                    @foreach($posts as $post)
                    <div class="card mb-2">        
                        <div class="card-body">
                        <p>件名：{{$post->articles->title}}</p>
                        <p>コメント：{{$post->content}}</p>
                        <p>投稿日：{{$post->created_at->format('Y年m月d日')}}</p>
                        </div>
                    </div>
                    @endforeach
                {{$posts->links()}}
            </div>
        </div>
    </div>
   
@endsection