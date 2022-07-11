@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('deleted'))
        <p class="alert alert-danger">{{session('deleted')}}</p>
    @endif
</div>
<div class="container">

    <div class="d-flex flex-wrap justify-content-center">
        @foreach($posts as $post)

        <div class="card flex-shrink-0 m-3 " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->description }}</h6>
                @forelse ($post->tags as $tag)
                    {{-- @dd($post->tags) --}}
                    <span class="badge badge-pill badge-primary">{{$tag->name}}</span>
                @empty
                    <span>--</span>
                @endforelse

                @if($post->category)
                    <p>Category: {{ $post->category->category }}</p>
                @endif

                <a href="{{ route('admin.post.show', $post) }}" class="card-link btn btn-success">Show</a>
                <a href="{{ route('admin.post.edit', $post) }}" class="card-link btn btn-primary">Edit</a>
                <form action="{{ route('admin.post.destroy', $post) }}" method="POST" class="d-inline card-link">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
        </div>

        @endforeach
    </div>
    {{ $posts->links() }}

    <div class="mt-5">
        @foreach($categories as $category)
            <h2>{{ $category->category }}</h2>

            <ul>
                @forelse ($category->posts as $post)
                    <li><a href="#">{{ $post->title }}</a></li>
                @empty
                    <li>Nessun post corrispondente questa categoria</li>
                @endforelse
            </ul>
        @endforeach
    </div>
</div>

@endsection
