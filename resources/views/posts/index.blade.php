@extends('layouts.front')

@section('title', 'Latest Posts')

@section('content')

<div class="row mt-5">
    <div class="col-md-6 offset-3">
        @if (!empty($status))
        <div class="alert alert-success">
            {{ $status }}
        </div>
        @endif
        @if (!empty($message))
        <div class="alert alert-info">
            {{ $message }}
            @php
                Session::forget('message'); // session()->forget('message');
            @endphp
        </div>
        @endif

        @foreach ($posts as $post)
        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{ $post->first_name }} {{ $post->last_name }}</h2>
            <p class="blog-post-meta">
                {{ $post->created_at }}
                @can('update', $post)
                | <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                @endcan
            </p>

            <p>{{ $post->body }}</p>
        </article>
        @endforeach

        {{ $posts->links() }}
    </div>
</div>

@endsection