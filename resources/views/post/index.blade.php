@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('posts.posts')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>@lang('posts.welcome'), {{Auth::user()->name}}</h3>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('post.create') }}">
                                    <button type="button" class="btn btn-outline-success">@lang('posts.create.post')</button>
                                </a>
                            </div>
                        </div>
                    @endauth
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-sm-12 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-dark card-link">@lang('posts.show')</a>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary card-link">@lang('posts.edit.noun')</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">@lang('posts.delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                    <p style="margin-left:20px;">{{ $posts->links() }}</p>
            </div>
        </div>
    </div>
</div>
@endsection