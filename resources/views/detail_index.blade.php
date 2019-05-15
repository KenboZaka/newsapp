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
                                <p>コメント：{{$post->content}}</p>
                                <a href="/detail/{{$post->id}}" class="btn btn-primary">詳細へ</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
                {{-- ここから下　違うところに貼り付ける予定 --}}
                
                    
                
               
                    
                
      
    {{-- <div class="" id="exampleModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/update/{{$post->id}}" method="post">
                <div class="form-group">
                    <label for="content">Post投稿内容</label>
                    <textarea class="form-control" name="content" cols="30" rows="10">{{$post->content}}</textarea>
                    @if($errors->has('content'))
                    <span class="text-danger">{{$errors->first('content')}}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <button type="button" class="btn btn-primary">投稿する</button>
                </div>
              </form>
            </div>

        </div>
    </div>
</div> --}}
@endsection