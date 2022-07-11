@extends('layouts.app')

@section('content')
<div class="container">

    @if($errors->all())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form id="form" action="{{ route('admin.post.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <p class="alert alert-danger mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $post->description) }}">
             @error('description')
                <p class="alert alert-danger mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $post->content) }}</textarea>
             @error('content')
                <p class="alert alert-danger mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="select" class="mr-2">Select Category: </label>
            <select id="select" class="form-select" aria-label="Default select example" name="category_id">
                <option selected>Select a category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}"
                @if(old('category_id', $post->category->id) == $category->id)
                    selected
                @endif
                >{{$category->category}}</option>
                @endforeach
            </select>
        </div>

        <div>
            @foreach ($tags as $tag)
                <input
                id="tag{{ $loop->iteration }}"
                type="checkbox"
                name="tags[]"
                value="{{ $tag->id }}"
                @if(!$errors->any() && $post->tags->contains($tag->id))
                    checked
                @elseif($errors->any() && in_array($tag->id, old('tags', [])))
                    checked
                @endif>
                <label class="mr-3" for="tag{{ $loop->iteration }}">{{ $tag->name }}</label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
