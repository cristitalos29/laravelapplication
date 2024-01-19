@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Your Pending Articles</h2>

        @if(count($editorPendingArticles) > 0)
            <div class="row my-3">
                @foreach($editorPendingArticles as $article)
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $article->title }}</h5>
                                <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                                <div class="d-flex flex-row mt-3">
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-warning me-1">Read</a>

                                    @if(Auth::user()->hasRole(3) || $article->user_id === Auth::id())
                                        <form action="{{ route('articles.approve', $article->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-success me-1">Approve</button>
                                        </form>

                                        <form action="{{ route('articles.delete', $article->id) }}" method="POST" class="ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Reject</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No pending articles available.</p>
        @endif
    </div>
@endsection
