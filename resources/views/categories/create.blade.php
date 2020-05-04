@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create category</div>

                <div class="card-body">
                    <form action="/categories" method="post">
                        @csrf
                        @method('POST')
                        @foreach (config('app.locales') as $local)
                            <div class="form-group">
                                <label>{{ Str::upper($local) }} Name</label>
                                <input name="{{ $local }}[name]" class="form-control">
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
