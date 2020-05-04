@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="m-0">Categories</p>
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">Add</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)

                            <div class="col-md-6 col-sm-12 mb-3">

                                <div class="card">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush mb-2">
                                            @foreach ($category->langs as $lang)
                                            
                                            <li class="list-group-item">{{ Str::upper($lang->lang) }} {{ $lang->name }}</li>
                                            
                                            @endforeach
                                        </ul>
                                        <div class="d-flex">
                                            <a href="{{ route('categories.show', [ 'category' => $category ]) }}" class="btn btn-primary mr-2">Full Info</a>
                                            <a href="{{ route('categories.edit', [ 'category' => $category ]) }}" class="btn btn-primary mr-2">Edit</a>
                                            <form action="{{ route('categories.destroy', [ 'category' => $category ]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
