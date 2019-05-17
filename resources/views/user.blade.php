@extends('layouts.master')

@section('title', 'user_posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                    <div class="card-header">
                            <p class="py-1 m-0">名前：{{$user->name}} さんの投稿一覧</p>
                    </div>
                    
                    @foreach($user->posts as $post)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p>コメント：{{$post->content}}</p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection