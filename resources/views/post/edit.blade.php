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

                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">

                    @foreach (config('app.locales') as $local)
                        <li class="nav-item">
                            <a 
                                class="nav-link" 
                                id="{{ Str::lower($local) }}-tab" 
                                data-toggle="tab" 
                                href="#{{ Str::lower($local) }}" 
                                role="tab" 
                                aria-controls="{{ Str::lower($local) }}" 
                                aria-selected="true">
                                {{ Str::upper($local) }}
                            </a>
                        </li>
                    @endforeach
                
                </ul>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $post->category_id ? 'selected' : '' }}>{{ $item->langs->first()->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="tab-content">
                    @foreach (config('app.locales') as $local)
                        <div 
                            class="tab-pane" 
                            id="{{ Str::lower($local) }}" 
                            role="tabpanel" 
                            aria-labelledby="{{ Str::lower($local) }}-tab">
                                <div class="form-group">
                                    <label for="title">{{ Str::upper($local) }} Title</label>
                                    <input name="{{ $local }}[title]" value="{{ $post->langs->where('lang', $local)->first()->title }}" type="text" class="form-control" placeholder="Enter title name" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="content">{{ Str::upper($local) }} Content</label>
                                    <textarea  name="{{ $local }}[content]" rows="8" class="form-control" placeholder="Enter content name" id="content">{{ $post->langs->where('lang', $local)->first()->content }}</textarea>
                                </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection