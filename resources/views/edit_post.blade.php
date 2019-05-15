@extends('layouts.master')

@section('title', 'post_detail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tab">
                    <ul>
                    <li>{{$post->content}}</li>
                    </ul>
                </div>
                <form action="/update/{{$post->id}}" method="post">
                    @csrf
                    <label for="content">Post投稿内容</label>
                    <textarea name="content" cols="30" rows="10">{{$post->content}}</textarea>
                    @if($errors->has('content'))
                    <span class="text-danger">{{$errors->first('content')}}</span>
                    @endif
                    <input type="submit" value="投稿する">
                </form>
                <a href="/article">一覧に戻る</a>
            </div>
        </div>
    </div>
 

@endsection


        
          
        
