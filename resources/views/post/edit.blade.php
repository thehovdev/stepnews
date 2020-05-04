@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Create post form</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 offset-2">
            <form action="{{ route('post.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{ $post->title }}" name="title" type="text" class="form-control" placeholder="Enter title name" id="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" rows="8" class="form-control" placeholder="Enter content name" id="content">{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection