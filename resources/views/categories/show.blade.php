@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('categories.create.form')</div>

                <div class="card-body">
                    <ul class="list-group list-group-flush mb-2">
                        @foreach ($category->langs as $lang)
                        
                        <li class="list-group-item">{{ Str::upper($lang->lang) }} {{ $lang->name }}</li>
                        
                        @endforeach
                    </ul>
                    <div class="d-flex">
                        <a href="{{ route('categories.edit', [ 'category' => $category ]) }}" class="btn btn-primary mr-2">@lang('categories.edit.verb')</a>
                        <form action="{{ route('categories.destroy', [ 'category' => $category ]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('categories.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
