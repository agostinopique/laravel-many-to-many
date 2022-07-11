@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->content }}</h6>
                @forelse ($post->tags as $tag)
                    <span class="badge badge-pill badge-primary">{{$tag->name}}</span>
                @empty
                    <span>--</span>
                @endforelse
                <p class="">Category: {{ $post->category->category }}</p>
                <a href="{{ route('admin.post.index') }}" class="card-link btn btn-success"><< Back</a>
                <a href="{{ route('admin.post.edit', $post) }}" class="card-link btn btn-primary">Edit</a>
                <form action="{{ route('admin.post.destroy', $post) }}" method="POST" class="d-inline card-link">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection
