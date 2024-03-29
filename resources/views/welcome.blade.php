@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            @foreach($articles as $article)
                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;">{{ $article->title }}</h5>
                            <p class="card-text">{{ substr($article->description, 0, 100).' ...' }}</p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-warning">Citeste</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
