@extends('layouts.app')

@section('content')
<div class="container">


    <div class="d-flex flex-column">
        <a class="btn btn-success" href="{{route('menu.create')}}">Add</a>
        @foreach ($menu as $item)
        <ul class="list-group m-2">
            <li class="list-group-item list-group-item-dark">
                <div class="d-flex justify-content-between">

                    <a href="{{route('show', $item->id)}}" style="color: rgba(255, 255, 255, 1);  text-decoration: none;">
                        <h3>{{$item->name}}</h3>
                    </a>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input data-id="{{$item->id}}" data-status="true" data-type="item" type="radio" class="toggle-class" name="options" id="option1" autocomplete="off" {{ $item->status==1 ? 'checked' : '' }}> Active
                        </label>

                        <label class="btn btn-secondary">
                            <input data-id="{{$item->id}}" data-status="false" data-type="item" type="radio" class="toggle-class" name="options" id="option3" autocomplete="off" {{ $item->status==0 ? 'checked' : '' }}> InActive
                        </label>
                    </div>

                    <div class="d-flex">
                        <a href="{{route('menu.edit', $item->id)}}" class="btn btn-warning mx-2">Edit</a>
                        <form action="{{route('menu.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
            @foreach ($item->menuSubitems as $subitem)
            <li class="list-group-item list-group-item-light d-flex justify-content-between"><a href="#" style="text-decoration: none; color: rgba(0, 0, 0, 0.7)"> {{$subitem->name}}</a>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input data-id="{{$subitem->id}}" data-status="true" data-type="subitem" data-menuid="{{$subitem->menu_item_id}}"  type="radio" class="toggle-class subitem" name="options" id="option1" autocomplete="off" {{ $subitem->status==1 ? 'checked' : '' }}> Active
                    </label>

                    <label class="btn btn-secondary">
                        <input data-id="{{$subitem->id}}" data-status="false" data-type="subitem" data-menuid="{{$subitem->menu_item_id}}"  type="radio" class="toggle-class subitem" name="options" id="option3" autocomplete="off" {{ $subitem->status==0 ? 'checked' : '' }}> InActive
                    </label>
                </div>
                <div>
                    <form action="{{route('submenu.destroy', $subitem->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style=" height: 35px;" class="btn btn-danger mx-2">Delete</button>
                    </form>
                </div>
            </li>

            @endforeach
        </ul>
        @endforeach

    </div>


</div>
@endsection