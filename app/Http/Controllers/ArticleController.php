<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(Article $articles){
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
    }

    public function show(Article $article){
        return view('show', ['article'=>$article]);
    }
}
