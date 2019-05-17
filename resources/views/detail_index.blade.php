@extends('layouts.master')

@section('title', 'detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <p>{{$article->title}}</p>
                    </div>
                    <div class="card-body">
                        <p>{!!nl2br(e($article->content))!!}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/article" class="btn btn-secondary">一覧に戻る</a>
                    </div>
                </div>
                
                <form action="/post/{{$article->id}}" method="post" class="card card-form">
                    @csrf
                    <label for="content" class="card-header">投稿内容</label>
                    <textarea name="content" cols="8" rows="8" class="card-body "></textarea>
                    @if($errors->has('content'))
                        <span class="text-danger">{{$errors->first('content')}}</span>
                    @endif
                    <input type="hidden" name="user_id" value="{{ Auth::id()}}">
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <input type="submit" value="投稿する" class="btn">
                </form>

                <div class="post_opinions my-5">
                    @foreach($posts as $post)
                        <div class="card">
                            <div class="card-body">
                                <p>名前：<a href="/user/{{$post->users->id}}">{{$post->users->name}}</a></p>
                                <p>コメント：{{$post->content}}</p>
                                <a href="/detail/{{$post->id}}" class="btn btn-primary">詳細へ</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
                
                    
                
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">コメント投稿</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div> --}}
    
@endsection