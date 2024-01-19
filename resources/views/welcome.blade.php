@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            @foreach($articles->groupBy('category') as $category => $categoryArticles)
                <div class="col-lg-3">
                    <h3 class="text-center mb-5">{{ app(\App\Http\Controllers\CategoryController::class)->getCategoryNameById($category) }}</h3>
                    @foreach($categoryArticles as $article)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $article->title }}</h5>
                                <p class="card-text">{{ substr($article->description, 0, 100).' ...' }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-success">Citeste</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
