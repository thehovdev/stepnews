@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>@lang('posts.create.form')</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 offset-2">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">@lang('posts.title')</label>
                    <input name="title" type="text" class="form-control" placeholder="@lang('posts.placeholder.title')" id="title">
                </div>
                <div class="form-group">
                    <label for="content">@lang('posts.content')</label>
                    <textarea name="content" rows="8" class="form-control" placeholder="@lang('posts.placeholder.content')" id="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('posts.submit')</button>
            </form>
        </div>
    </div>
</div>
@endsection