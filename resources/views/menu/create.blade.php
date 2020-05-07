@extends('layouts.app')

@section('content')
<div class="container">


    <form action="{{route('menu.store')}}" method="POST">
        @csrf
        @component('components.form')
        
        @endcomponent
        
    </form>


</div>
@endsection