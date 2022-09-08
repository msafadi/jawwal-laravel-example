@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="d-flex mb-4 justify-content-between">
            <div>
                <h2>Edit Post</h2>
            </div>
            @can('delete', $post)
            <div>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete Post!</button>
                </form>
            </div>
            @endcan
        </div>
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            {{-- Form Method Spoofing --}}
            @method('put')

            <div class="mb-3">
                <textarea name="body" rows="3" class="form-control">{{ old('body', $post->body) }}</textarea>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="visibility" class="form-select">
                        <option value="public" @selected(old('visibility', $post->visibility) == 'public')>Public</option>
                        <option value="friends" @selected(old('visibility', $post->visibility) == 'friends')>Freinds</option>
                        <option value="me" @if(old('visibility', $post->visibility) == 'me') selected @endif>Only Me</option>
                    </select>
                    @error('visibility')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Update Post</button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection