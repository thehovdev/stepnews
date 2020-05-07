@extends('layouts.app')

@section('content')
<div class="container">




    <div class="d-flex justify-content-center">


        <div class="card w-100" >
            <div class="card-body">
                
                <h5 class="card-title m-2">Name: {{$item->name}}</h5>
                <h6 class="card-subtitle mb-2 m-2 text-muted">Route name: {{$item->route_name}}</h6>
                @foreach ($item->menuSubitems as $subitem)
                <div class="d-flex justify-content-between border-top border-bottom m-2">
                   <a href="#" style="text-decoration: none; color: rgba(0, 0, 0, 0.7)"> {{$subitem->name}}  --  {{$subitem->route_name}}</a> 
                   <div>
                       <a href="" class="btn btn-warning" style=" height: 35px; ">Edit</a> 
                       <a href="" class="btn btn-danger" style=" height: 35px; ">Delete</a>
                   </div>
                </div>
                @endforeach
            </div>
        </div>



    </div>


</div>
@endsection