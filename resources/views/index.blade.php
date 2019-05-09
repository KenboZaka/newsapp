@extends('layouts.master')

@section('title', 'top_page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tab">
                    <ul>
                        @foreach($articles as $article)
                    <li><a href="/article/{{$article->id}}">{{$article->title}}</a></li>
                        <li>{{$article->content}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

