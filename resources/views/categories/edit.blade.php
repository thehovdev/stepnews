@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit category</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', [ 'category' => $category ]) }}" method="post">
                        @csrf
                        @method('PUT')
                        @foreach ($category->langs as $lang)
                            <div class="form-group">
                                <label>{{ Str::upper($lang->lang) }} Name</label>
                                <input name="{{ $lang->lang }}[name]" class="form-control" value="{{ $lang->name }}">
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
