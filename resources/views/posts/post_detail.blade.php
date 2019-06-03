@extends('layouts.master')

@section('title', 'post_detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                  <div class="card-header">
                    <p>{{$post->articles->title}}</p>
                    <p>名前：<a href="/user/{{$post->users->id}}">{{$post->users->name}}</a></p>
                  </div>
                    <div class="card-body">
                      <p>コメント：{!!nl2br(e($post->content))!!}</p>
                    </div>
                    <div class="card-footer p-3">
                    {{-- いいね機能実装 --}}
                      @if($post->user_id == Auth::id())
                        <form action="/post/delete/{{$post->id}}" method="post" class="m-0">
                            @csrf
                            <button type="submit" class="btn delete ml-2 px-2 float-right">Delete</button>
                        </form>
                            <a class="btn edit float-right" href="/post/edit/{{$post->id}}">Edit</a>
                      @endif
                        <div>
                        @if($is_like)
                            <form action="/like/delete/{{$post->id}}" method="post" class="mb-0">
                                @csrf
                                <button type="submit" name="user_id post_id" class="btn btn-primary">
                                    取り消し  <i class="far fa-thumbs-up"></i>{{$like_count}}
                                </button>
                            </form>
                        @else
                            <form action="/like/store/{{$post->id}}" method="post" class="mb-0">
                                @csrf
                                <button type="submit" name="user_id post_id" class="btn btn-primary">
                                    いいね  <i class="far fa-thumbs-up"></i>{{$like_count}}
                                </button>
                            </form>
                        @endif
                        </div>
                    </div>
                    {{-- いいね機能　ここまで --}}
                </div>
            <div class="clearfix">
              <a href="/article/{{$post->article_id}}" class="btn btn-secondary float-right mb-3">記事に戻る</a>
            </div>
                <div class="accordionPost">
                  <div class="card">
                      <div class="card-header" id="accordion">
                          <h5 class="mb-0">
                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#post" aria-expanded="true" aria-controls="post">
                                投稿してみませんか？
                              </button>
                          </h5>
                      </div>
                      {{-- 投稿が完了したらメッセージを表示 --}}
                      @if(Session::has('message'))
                    <div class="submit_message text-center text-secondary">
                      <p class="p-3 m-0">{{ Session::get('message') }}</p>
                    </div>
                      @endif
                      <div id="post" class="collapse" aria-labelledby="post" data-parent="#accordion" >
                          <div class="card">
                              <div class="card-body">
                              <form action="/comment/create/{{$post->id}}" method="post" class="card card-form ">
                                  @csrf
                                  <label for="content">投稿内容</label>
                                  <textarea name="content" cols="8" rows="8" class="card-body p-1"></textarea>
                                  @if($errors->has('content'))
                                  <span class="text-danger">{{$errors->first('content')}}</span>
                                  @endif
                              </div>
                                  <input type="hidden" name="user_id" value="{{ Auth::id()}}">
                                  <input type="hidden" name="post_id" value="{{$post->id}}">
                                  <input type="submit" class="btn btn-primary float-right" value="投稿する">
                              </form>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="post_opinions my-5">
                    {{-- ポストに対するコメント一覧 --}}
                    @foreach($post->comments as $comment)
                        <div class="card">
                            <div class="card-header">
                            <p class="py-1 m-0">名前：<a href="/user/{{$comment->users->id}}">{{$comment->users->name}}</a></p>
                            </div>
                            <div class="card-body">
                                <p>コメント：{{$comment->content}}</p>
                                <p>投稿日：{{$comment->created_at->format('Y年m月d日')}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection