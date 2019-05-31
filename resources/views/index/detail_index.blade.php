@extends('layouts.master')

@section('title', 'detail')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
              <p class="lead">{{$article->title}}</p>
              <p>{{$article->description}}</p>
            </div>
            <div class="card-body">
              @if(isset($article->image))
                <img src="{{$article->image}}" width="400px" class="float-left">
              @endif
                <p>{!!nl2br(e($article->content))!!}</p>
                <a href="{{$article->url}}" target="blank" class="m-5">ソースページはこちら</a>
            </div>
            <div class="card-footer">
                <a href="/article" class="btn btn-secondary">一覧に戻る</a>
            </div>
        </div>
      <div class="accordionPost">
        <div class="card">
            <div class="card-header" id="accordion">
                <h5>
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#post" aria-expanded="true" aria-controls="post">
                      投稿してみませんか？
                  </button>
                </h5>
            </div>
            @if(Session::has('message'))
              <div class="submit_message text-center text-secondary">
                <p class="p-3 m-0">{{ Session::get('message') }}</p>
              </div>
            @endif
            <div id="post" class="collapse" aria-labelledby="post" data-parent="#accordion" >
                <div class="card">
                    <div class="card-body">
                    <form action="/post/store" method="post" class="card card-form">
                      @csrf
                          <label for="content">投稿内容</label>
                          <textarea name="content" cols="8" rows="8" class="card-body p-2"></textarea>
                        @if($errors->has('content'))
                          <span class="text-danger">{{$errors->first('content')}}</span>
                        @endif
                      </div>
                          <input type="hidden" name="user_id" value="{{ Auth::id()}}">
                          <input type="hidden" name="article_id" value="{{$article->id}}">
                          <input type="submit" class="btn btn-primary float-right" value="投稿する">
                    </form>
                </div>
            </div>
        </div>
      </div>
        <div class="post_opinions my-5">
          @foreach($posts as $post)
            <div class="card">
              <div class="card-body">
                <p>名前：<a href="/user/{{$post->users->id}}">{{$post->users->name}}</a></p>
                <p>コメント：{{$post->content}}</p>
                <p>投稿日：{{$post->created_at->format('Y年m月d日')}}</p>
                <a href="/detail/{{$post->id}}" class="btn btn-primary">詳細へ</a>
              </div>
            </div>
          @endforeach
        </div>
    </div>
  </div>
</div>
@endsection