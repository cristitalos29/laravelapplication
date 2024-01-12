<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showArt()
    {
        $articles = Article::where('category', 1)->get();
        return view('categories.art', compact('articles'));
    }

    public function showTech()
    {
        $articles = Article::where('category', 2)->get();
        return view('categories.tech', compact('articles'));
    }

    public function showScience()
    {
        $articles = Article::where('category', 3)->get();
        return view('categories.science', compact('articles'));
    }

    public function showFashion()
    {
        $articles = Article::where('category', 4)->get();
        return view('categories.fashion', compact('articles'));
    }
}
