@extends('layouts.master')

@section('title', 'article_top')

@section('content')
<div class="container">
<div class="row">
  <div class="col">
    {{-- bootstrap4アコーディオン使用 --}}
    <div class="accordion" id="accordion-news">
      <div class="card" >
        <div class="card-header card-sports" id="sports">
            <h5>
              <button class="accordion-tag text-white btn btn-link" type="button" data-toggle="collapse" data-target="#sports" aria-expanded="false" aria-controls="sports">
                  Sports
              </button>
            </h5>
        </div>
        <div id="sports" class="collapse" aria-labelledby="sports" data-parent="#accordion-news">
            @foreach($articles as $article)
            {{-- ジャンルが１（スポーツ）の記事を表示 --}}
              @if($article->genre==1)
                <div class="card">
                  <div class="card-body">
                      <div class="row">
                        <a href="/article/{{$article->id}}" class="lead float-left ml-3 pb-3 clearfix">{{$article->title}}</a>
                          <div class="pb-0 col-sm-12 mt-2 float-right">
                            <p>{{$article->description}} </p>
                            <span class="badge badge-info mb-2 p-3 float-sm-right clearfix">コメント数：{{$article->posts->count()}} 件</span>           
                          </div>
                          {{-- 写真があれば表示 --}}
                          @if(isset($article->image))
                            <div class="col">
                              <img src="{{$article->image}}" width="300px" class="float-sm-left img-thumbnail img-fluid">
                            </div>
                          @endif
                          {{-- コメント投稿があれば１件だけ表示 --}}
                          <?php $i=0; ?>
                          @forelse($article->posts as $post)
                            <div class="card col-sm-8 m-2 p-0">
                              <div class="card-header">
                                <h6 class="m-0">他のユーザーさんの投稿</h6>
                              </div>
                              <div class="card-body p-3">
                                <p class="m-0">ユーザー名：{{$post->users->name}}</p>
                                <p>{!!nl2br(e($post->content))!!}</p>
                              </div>
                              <div class="card-footer bg-white">
                                <p class="m-0">投稿日：{{$post->created_at->format('Y年m月d日')}}</p>
                              </div>
                            </div>
                             <?php if($i>=1);?>
                             <?php break; ?>
                            {{-- 投稿がない場合は、「投稿しませんか」メッセージを表示 --}}
                            @empty
                            <div class="justify-content-center align-middle card col-sm-8 m-2 p-4" >
                              <p class="text-center mb-0">この記事にはまだコメントがありません</p>
                              <a href="/article/{{$article->id}}" class="btn btn-secondary float-right" class="btn btn-secondary">投稿してみませんか？</a>
                            </div>
                          @endforelse
                      </div>
                  </div>
                    <div class="card-footer">
                        <p class="text-sm-right mb-0">更新日：{{$article->updated_at->format('Y年m月d日')}}</p>
                    </div>
                </div>
              @endif
            @endforeach
        </div>
      </div>
    <div class="card">
      <div class="card-header card-enta" id="entertainment">
        <h5>
          <button class="accordion-tag btn btn-link text-white" type="button" data-toggle="collapse" data-target="#entertainment" aria-expanded="false" aria-controls="entertainment">
              Entertainment
          </button>
        </h5>
      </div>
      <div id="entertainment" class="collapse" aria-labelledby="entertainment" data-parent="#accordion-news">
          @foreach($articles as $article)
      {{-- ジャンルが2（エンタメ）の記事を表示 --}}
            @if($article->genre==2)
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <a href="/article/{{$article->id}}" class="lead float-left ml-3 pb-3 clearfix">{{$article->title}}</a>
                    <div class="pb-0 col-sm-12 mt-2 float-right">
                      <p>{{$article->description}} </p>
                      <span class="badge badge-info mb-2 p-3 float-sm-right clearfix">コメント数：{{$article->posts->count()}} 件</span>
                    </div>
                    {{-- 写真があれば表示 --}}
                    @if(isset($article->image))
                      <div class="col">
                        <img src="{{$article->image}}" width="300px" class="float-left img-thumbnail image-fluid">
                      </div>
                    @endif
                    {{-- コメント投稿があれば１件だけ表示 --}}
                    <?php $i=0; ?>
                      @forelse($article->posts as $post)
                        <div class="card col-sm-8 m-2">
                            <div class="card-header">
                              <h6 class="m-0">他のユーザーさんの投稿</h6>
                            </div>
                            <div class="card-body p-3">
                              <p class="m-0">ユーザー名：{{$post->users->name}}</p>
                              <p>{!!nl2br(e($post->content))!!}</p>
                            </div>
                            <div class="card-footer bg-white">
                              <p class="m-0">投稿日：{{$post->created_at->format('Y年m月d日')}}</p>
                            </div>
                        </div>
                        <?php if($i>=1); ?>
                        <?php break; ?>
                      @empty
                      {{-- 投稿がない場合は、「投稿しませんか」メッセージを表示 --}}
                      <div class="justify-content-center align-middle card col-sm-8 m-2 p-4" >
                        <p class="text-center mb-0">この記事にはまだコメントがありません</p>
                        <a href="/article/{{$article->id}}" class="btn btn-secondary float-right" class="btn btn-secondary">投稿してみませんか？</a>
                      </div>
                      @endforelse
                  </div>
                </div>
                <div class="card-footer">
                    <p class="text-sm-right mb-0">更新日：{{$article->updated_at->format('Y年m月d日')}}</p>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    <div class="card">
          <div class="card-header  card-business" id="business">
            <h5>
              <button class="accordion-tag btn btn-link text-white" type="button" data-toggle="collapse" data-target="#business" aria-expanded="false" aria-controls="business">
                  Business
              </button>
            </h5>
          </div>
      <div id="business" class="collapse show" aria-labelledby="business" data-parent="#accordion-news">
          @foreach($articles as $article)
            @if($article->genre==3)
            {{-- ジャンルが３（ビジネス）の記事を表示 --}}
              <div class="card">
                <div class="card-body">
                      <div class="row">
                          <a href="/article/{{$article->id}}" class="lead float-left ml-3 pb-3 clearfix">{{$article->title}}</a>
                          <div class="pb-0 mt-2 col-sm-12 float-right">
                            <p>{{$article->description}} </p>
                            <span class="badge badge-info mb-2 p-3 float-sm-right clearfix">コメント数：{{$article->posts->count()}} 件</span>
                          </div>
                          {{-- 写真があれば表示 --}}
                          @if(isset($article->image))
                            <div class="col">
                              <img src="{{$article->image}}" width="300px" class="float-left img-thumbnail image-fluid">
                            </div>
                          @endif
                        {{-- コメント投稿があれば１件だけ表示 --}}
                          <?php $i=0; ?>
                            @forelse($article->posts as $post)
                              <div class="card col-sm-8 m-2">
                                <div class="card-header">
                                  <h6 class="m-0">他のユーザーさんの投稿</h6>
                                </div>
                                <div class="card-body p-3">
                                  <p class="m-0">ユーザー名：{{$post->users->name}}</p>
                                  <p>{!!nl2br(e($post->content))!!}</p>
                                </div>
                                <div class="card-footer bg-white">
                                  <p class="m-0">投稿日：{{$post->created_at->format('Y年m月d日')}}</p>
                                </div>
                              </div>
                             <?php if($i>=1); ?>
                             <?php break; ?>
                            @empty
                            {{-- 投稿がない場合は、「投稿しませんか」メッセージを表示 --}}
                            <div class="justify-content-center align-middle card col-sm-8 m-2 p-4" >
                              <p class="text-center mb-0">この記事にはまだコメントがありません</p>
                              <a href="/article/{{$article->id}}" class="btn btn-secondary float-right" class="btn btn-secondary">投稿してみませんか？</a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                  <div class="card-footer">
                      <p class="text-sm-right mb-0">更新日：{{$article->updated_at->format('Y年m月d日')}}</p>
                  </div>
              </div>
            @endif
          @endforeach
        </div>
      <div id="bottom"></div>
    </div>
  </div>
  </div>
</div>
</div>
<script src='{{asset("js/app.js")}}'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection
