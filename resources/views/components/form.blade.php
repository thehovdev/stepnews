<div class="form-group">
    <label for="exampleInputEmail1">Menu item</label>
    <input autocomplete="off" type="text" class="form-control" name="name" placeholder="Enter menu item" value="{{ isset($item)  ? $item->name : Request::old('name') }}">
    <small id=" emailHelp" class="form-text text-danger"> {{ $errors->first('name')}}</small>

</div>

<div class="form-group">
    <label for="exampleInputEmail1">Route name</label>
    <input autocomplete="off" type="text" class="form-control" name="route_name" placeholder="Enter route name" value="{{isset($item)  ? $item->route_name : Request::old('route_name') }}">
    <small id=" emailHelp" class="form-text text-danger"> {{ $errors->first('route_name')}}</small>

</div>


<div class="form-group" id="subs">
    <div>
        <label for="exampleInputEmail1">Add subitem</label>
        <button class="btn btn-success" id="add-field">+</button>

    </div>

    @if(!isset($item))
        <p class="text-muted m-0"> - 1 -</p>
        <input autocomplete="off" type="text" class="form-control mt-2 mb-1 sub" name="subitems[0][name]" placeholder="Enter subitem">
        <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('subitems.*.name')}}</small>
        <input autocomplete="off" type="text" class="form-control mt-1 mb-2 sub" name="subitems[0][route_name]" placeholder="Enter route name">
        <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('subitems.*.route_name')}}</small>
    @else
        @foreach ($item->menuSubitems as $key=>$subitem)
            <p class="text-muted m-0"> - {{$key+1}} -</p>
            <input type="hidden" name="subitems[{{$key}}][id]" value="{{$subitem->id}}">
            <input autocomplete="off" type="text" class="form-control mt-2 mb-1 sub" value="{{$subitem->name}}" name="subitems[{{$key}}][name]" placeholder="Enter subitem">
            <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('subitems.*.name')}}</small>
            <input autocomplete="off" type="text" class="form-control mt-1 mb-2 sub" value="{{$subitem->route_name}}" name="subitems[{{$key}}][route_name]" placeholder="Enter route name">
            <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('subitems.*.route_name')}}</small>
        @endforeach
    @endif
</div>



<button type="submit" class="btn btn-primary">Save</button>