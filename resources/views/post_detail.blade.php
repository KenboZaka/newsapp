@extends('layouts.master')

@section('title', 'post_detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-header">
                    <p>名前：{{$post->users->name}}</p>
                    </div>
                    <div class="card-body">
                        <p>{!!nl2br(e($post->content))!!}</p>
                    </div>
                    <div class="card-footer">

                    @if($post->user_id == Auth::id())
                    <form action="/delete/{{$post->id}}" method="post">
                        @csrf
                        <input type="submit" value="Delete" class="btn delete ml-2 px-2 float-right">
                    </form>
                        <a class="btn edit float-right" href="/edit/{{$post->id}}">Edit</a>
                    @endif
                    <div>
                    <form action="/detail/{{$post->id}}/store" method="post">
                        @csrf
                        <input type="submit" name="user_id post_id" class="btn btn-primary" value="いいね">
                    </form>
                    <i class="far fa-thumbs-up"></i>


                            {{-- <span>{{$like->user_id}}</span> --}}
                    
                    </div>
                    </div>
                    
                </div>
                <div class="clearfix">
                <a href="/article/{{$post->article_id}}" class="btn btn-secondary float-right mb-3">記事に戻る</a>
                </div>
                
                <form action="/comment/{{$post->id}}" method="post" class="card card-form ">
                    @csrf
                    <label for="content" class="card-header">投稿内容</label>
                    <textarea name="content" cols="8" rows="8" class="card-body "></textarea>
                    @if($errors->has('content'))
                        <span class="text-danger">{{$errors->first('content')}}</span>
                    @endif
                    <input type="hidden" name="user_id" value="{{ Auth::id()}}">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="submit" value="投稿する" class="btn">
                </form>
                

                <div class="post_opinions my-5">
                    @foreach($post->comments as $comment)
                        <div class="card">
                            <div class="card-header">
                            <p class="py-1 m-0">名前：<a href="/user/{{$comment->users->id}}">{{$comment->users->name}}</a></p>
                            </div>
                            <div class="card-body">
                                <p>コメント：{{$comment->content}}</p>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection