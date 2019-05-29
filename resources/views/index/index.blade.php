@extends('layouts.master')

@section('title', 'article_top')

@section('content')
<div class="container">
<div class="row">
    <div class="col">
        <div class="accordion" id="accordion-news">
            <div class="card">
                <div class="card-header card-sports" id="sports">
                    <h5>
                        <button class="btn btn-link" type="button" data-toggle="collapse" href="#sports" aria-expanded="false" aria-controls="sports">
                            Sports
                        </button>
                    </h5>
                </div>
                <div id="sports" class="collapse" aria-labelledby="sports" data-parent="#accordion-news">
                    @foreach($articles as $article)
                        @if($article->genre==1)
                        <div class="card ">
                            <div class="card-body">
                                @if($article->id%2!=0)
                                    <a href="/article/{{$article->id}}" class="lead float-left pb-3 clearfix">{{$article->title}}</a>
                                    <div class="pb-0 col-7 mt-2 float-right">
                                    <p>{{$article->description}} </p>
                                    <span class="badge badge-info p-3 float-right">コメント数：{{$article->posts->count()}} 件</span>
                                    </div>
                                    <img src="{{$article->image}}" width="350px" class="float-left img-thumbnail">
                                @else
                                    <a href="/article/{{$article->id}}" class="lead pb-3 clearfix">{{$article->title}}</a>
                                    <div class="pb-0 col-7 mt-2 float-left">
                                    <p>{{$article->description}}</p>
                                    <span class="badge badge-info p-3 float-left">コメント数：{{$article->posts->count()}} 件</span>
                                    </div>
                                    <img src="{{$article->image}}" width="350px" class="float-right img-thumbnail">  
                                @endif
                            </div>
                            <div class="card-footer">
                                <p class="text-right mb-0">更新日：{{$article->updated_at->format('Y年m月d日')}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header card-enta" id="entertainment">
                    <h5>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#entertainment" aria-expanded="false" aria-controls="entertainment">
                            Entertainment
                        </button>
                    </h5>
                </div>
                <div id="entertainment" class="collapse" aria-labelledby="entertainment" data-parent="#accordion-news">
                    @foreach($articles as $article)
                        @if($article->genre==2)
                        <div class="card">
                            <div class="card-body">
                                @if($article->id%2!=0)
                                    <a href="/article/{{$article->id}}" class="lead float-left pb-3 clearfix">{{$article->title}}</a>
                                    <div class="pb-0 col-7 mt-2 float-right">
                                        <p>{{$article->description}} </p>
                                        <span class="badge badge-info p-3 float-right">コメント数：{{$article->posts->count()}} 件</span>
                                    </div>
                                    <img src="{{$article->image}}" width="350px" class="float-left img-thumbnail">
                                @else
                                    <a href="/article/{{$article->id}}" class="lead pb-3 clearfix">{{$article->title}}</a>
                                    <div class="pb-0 col-7 mt-2 float-left">
                                        <p>{{$article->description}} </p>
                                        <span class="badge badge-info p-3 float-left">コメント数：{{$article->posts->count()}} 件</span>
                                    </div>
                                    <img src="{{$article->image}}" width="350px" class="float-right img-thumbnail">
                                @endif
                            </div>
                            <div class="card-footer">
                                <p class="text-right mb-0">更新日：{{$article->updated_at->format('Y年m月d日')}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header  card-business" id="business">
                    <h5>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#business" aria-expanded="false" aria-controls="business">
                            Business
                        </button>
                    </h5>
                </div>
                <div id="business" class="collapse" aria-labelledby="business" data-parent="#accordion-news">
                    @foreach($articles as $article)
                        @if($article->genre==3)
                        <div class="card">
                            <div class="card-body">
                                    @if($article->id%2!=0)
                                    <a href="/article/{{$article->id}}" class="lead float-left pb-3 clearfix">{{$article->title}}</a>
                                    <div class="pb-0 col-7 mt-2 float-right">
                                        <p>{{$article->description}} </p>
                                        <span class="badge badge-info p-3 float-right">コメント数：{{$article->posts->count()}} 件</span>
                                    </div>
                                    <img src="{{$article->image}}" width="350px" class="float-left img-thumbnail">
                                @else
                                    <a href="/article/{{$article->id}}" class="lead pb-3 clearfix">{{$article->title}}</a>
                                    <div class="pb-0 col-7 mt-2 float-left">
                                        <p>{{$article->description}} </p>
                                        <span class="badge badge-info p-3 float-left">コメント数：{{$article->posts->count()}} 件</span>
                                    </div>
                                    <img src="{{$article->image}}" width="350px" class="float-right img-thumbnail">
                                @endif
                            </div>
                            <div class="card-footer">
                                <p class="text-right mb-0">更新日：{{$article->updated_at->format('Y年m月d日')}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src='{{asset("js/app.js")}}'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
