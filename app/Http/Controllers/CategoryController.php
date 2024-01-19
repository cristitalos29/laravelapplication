<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryNameById($categoryId)
    {
        $category = Category::find($categoryId);

        if ($category) {
            return $category->category_name;
        }

        return 'Category not found';
    }

    public function showArt()
    {
        $articles = Article::where('category', 1)
            ->where('status_id', 1)
            ->get();

        return view('categories.art', compact('articles'));
    }

    public function showTech()
    {
        $articles = Article::where('category', 2)
            ->where('status_id', 1)
            ->get();

        return view('categories.tech', compact('articles'));
    }

    public function showScience()
    {
        $articles = Article::where('category', 3)
            ->where('status_id', 1)
            ->get();

        return view('categories.science', compact('articles'));
    }

    public function showFashion()
    {
        $articles = Article::where('category', 4)
            ->where('status_id', 1)
            ->get();

        return view('categories.fashion', compact('articles'));
    }
}
