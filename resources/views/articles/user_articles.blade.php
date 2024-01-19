@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-5">My Articles:</h2>

        {{-- Approved Articles Section --}}
        @php
            $approvedArticles = $userArticles->where('status_id', 1);
            $draftArticles = $userArticles->where('status_id', 3);
        @endphp

        {{-- Approved Articles --}}
        @if(count($approvedArticles) > 0)
            <h3>Approved Articles</h3>
            <div class="row my-3 mb-5">
                @foreach($approvedArticles as $article)
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $article->title }}</h5>
                                <p class="card-text">{{ substr($article->description, 0, 100).' ...' }}</p>
                                <div class="d-flex flex-row">
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-warning">Read</a>

                                    {{-- Edit button --}}
                                    @if(Auth::user()->hasRole(3) || $article->user_id === Auth::id())
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-primary ms-3">Edit</a>
                                        <form action="{{ route('articles.delete', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger ms-3">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Draft Articles --}}
        @if(count($draftArticles) > 0)
            <h3>Draft Articles</h3>
            <div class="row my-3">
                @foreach($draftArticles as $article)
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $article->title }}</h5>
                                <p class="card-text">{{ substr($article->description, 0, 100).' ...' }}</p>
                                <div class="d-flex flex-row">
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-warning">Read</a>

                                    {{-- Edit button --}}
                                    @if(Auth::user()->hasRole(3) || $article->user_id === Auth::id())
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-primary ms-3">Edit</a>
                                        <form action="{{ route('articles.delete', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger ms-3">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Message when no articles are found --}}
        @if(count($approvedArticles) == 0 && count($draftArticles) == 0)
            <p>You haven't created any articles yet.</p>
        @endif
    </div>
@endsection
