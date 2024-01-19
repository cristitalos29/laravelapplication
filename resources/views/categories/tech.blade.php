@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-center mb-5">Tech</h3>
        <div class="row my-3">
            @foreach($articles as $article)
                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">{{ $article->title }}</h5>
                            <p class="card-text">{{ substr($article->description, 0, 100).' ...' }}</p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-warning">Read</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Posted at:  {{$article->created_at}}
                                in Category: {{ app(\App\Http\Controllers\CategoryController::class)->getCategoryNameById($article->category) }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
