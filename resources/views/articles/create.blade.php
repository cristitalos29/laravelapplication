@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('article.store') }}">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group mb-2">
                        <label for="title" class="col-md-4 col-form-label">Title</label>

                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') }}"
                               autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="col-md-4 col-form-label">Content</label>
                        <div class="col-sm-12">
                        <textarea name="description" class="form-control editor" id="description">
                        </textarea>
                        </div>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="category" class="col-md-4 col-form-label">Category</label>
                        <div class="col-sm-12">
                            <select class="form-select" id="category" name="category" aria-label="Default select example">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group pt-4">
                        <button class="btn btn-outline-warning">Create New Article</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
