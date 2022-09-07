@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="mb-4">Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="post">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
            <div class="mb-3">
                <textarea name="body" rows="3" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select name="visibility" class="form-select">
                        <option value="public">Public</option>
                        <option value="friends">Freinds</option>
                        <option value="me">Only Me</option>
                    </select>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary">Publish Post</button>  
                </div>
            </div>
        </form>
    </div>
</div>

@endsection