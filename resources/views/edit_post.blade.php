@extends('layouts.master')

@section('title', 'post_detail')

@section('content')
<div class="container">
        <div class="row">
            <div class="col">
                <form action="/update/{{$post->id}}" method="post" class="card card-form">
                    @csrf
                    <label for="content" class="card-header">編集内容</label>
                    <textarea name="content" cols="8" rows="8" class="card-body ">{{$post->content}}</textarea>
                    @if($errors->has('content'))
                        <span class="text-danger">{{$errors->first('content')}}</span>
                    @endif
                    <input type="hidden" name="article_id" value="{{ $post->article_id }}">
                    <input type="submit" value="投稿する" class="btn">
                </form>
                <a href="/article">戻る</a>
            </div>
        </div>
    </div>
@endsection


        
          
        
