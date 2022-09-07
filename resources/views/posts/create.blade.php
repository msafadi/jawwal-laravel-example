@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="mb-4">Create New Post</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            Validation Error!
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('posts.store') }}" method="post">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
            <div class="mb-3">
                <textarea name="body" rows="3" class="form-control">{{ old('body') }}</textarea>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="visibility" class="form-select">
                        <option value="public" @selected(old('visibility') == 'public')>Public</option>
                        <option value="friends" @selected(old('visibility') == 'friends')>Freinds</option>
                        <option value="me" @selected(old('visibility') == 'me')>Only Me</option>
                    </select>
                    @error('visibility')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Publish Post</button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection