@extends('layouts.master')

@section('title', 'article_top')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-unstyled my-2">
                    @foreach($articles as $article)
                  <a href="/article/{{$article->id}}">{{$article->title}}</a>
                  <a href="{{$article->url}}">ソースページはこちら</a>
                  <p>{{$article->description}}</p>
                  <img src="{{$article->image}}" width="200px">
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    
@endsection

            {{-- <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Category 1</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Category 2</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Category 3</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Category 4</a>
                    </li>
                </ul> --}}
                {{-- $api_article->array_key($api_article) --}}