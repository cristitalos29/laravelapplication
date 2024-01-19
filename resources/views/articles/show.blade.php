@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-5">
            <div class="card-header">
                Autor: <b>{{$user->name}}</b>
            </div>
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold;">{{$article->title}}</h5>
                <p class="card-text">{{$article->description}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Posted at:  {{$article->created_at}}
                    in Category: {{ app(\App\Http\Controllers\CategoryController::class)->getCategoryNameById($article->category) }}
                </small>
            </div>
        </div>
    </div>
@endsection
