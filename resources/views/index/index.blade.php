@extends('layouts.master')

@section('title', 'article_top')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs">
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
                </ul>

            
                <ul class="list-unstyled my-2">
                    @foreach($articles as $article)
                  <p>{{$article->title}}</p>
                  <p>{{$article->author}}</p>
                  <img src="{{$article->urlToImage}}" width="400px">
                        {{-- <li><a href="/article/{{$article->id}}">{{$article->title}}</a></li>
                        <li>{{$article->content}}</li> --}}
                    @endforeach
                </ul>

            </div>
        </div>
    </div>

    
@endsection

