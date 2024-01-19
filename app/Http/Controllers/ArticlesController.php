<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function welcome()
    {
        $articles = Article::where('status_id', 1)->get();
        return view('welcome', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $user = $article->user;
        return view('articles.show', compact('article', 'user'));
    }

    public function editorPendingArticles()
    {
        $editorPendingArticles = Article::where('status_id', 3)->get();
        return view('articles.editor_pending_articles', compact('editorPendingArticles'));
    }

    public function userArticles()
    {
        $userArticles = Article::where('user_id', auth()->id())->get();
        return view('articles.user_articles', compact('userArticles'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }
    public function approveArticle($id)
    {
        $article = Article::findOrFail($id);
        if (Auth::user()->hasRole(3)) {
            DB::table('articles')->where('id', $article->id)->update(['status_id' => 1]);

            return redirect()->route('editor.pending.articles')->with('success', 'Article approved successfully!');
        }

        // Redirect back with an error message if the user doesn't have permission
        return redirect()->back()->with('error', 'You do not have permission to approve this article.');
    }
    public function delete($id)
    {
        $article = Article::findOrFail($id);

        if (Auth::user()->hasRole(3) || $article->user_id === Auth::id()) {
            $article->delete();
            return redirect()->route('user.articles')->with('success', 'Article deleted successfully!');
        }

        // Redirect back with an error message if the user doesn't have permission
        return redirect()->back()->with('error', 'You do not have permission to delete this article.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic if needed

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'status_id' => 3, // Set status_id to 3 (Draft)
        ]);

        return redirect()->route('articles.show', $article->id)->with('success', 'Article updated successfully!');
    }

    public function store(Request $request)
    {
        // Validare date primite prin formular
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|exists:categories,id',
            // Alte reguli de validare, dacă este cazul
        ]);

        // Creare articol folosind datele primite
        Article::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'status_id' => 3, // status 3 is for 'Draft'
        ]);

        return redirect()->route('article.show')->with('success', 'Article created successfully!');
    }

}
