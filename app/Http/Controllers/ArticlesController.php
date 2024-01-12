<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


class ArticlesController extends Controller
{
    public function welcome()
    {
        $articles = Article::all();
        return view('welcome', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $user = $article->user;
        return view('articles.show', compact('article', 'user'));
    }

    public function create()
    {
        return view('articles.create');
    }
}
