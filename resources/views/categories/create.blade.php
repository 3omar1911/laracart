@extends('layouts.main')

@section('content')

@if($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach

    </ul>
    
</div>

@endif

<div>
    <form method="post" action="/categories">
        {{ csrf_field() }}
        <label>category Name: </label>
        <input type="text" name="name">
        <input type="submit" name="addCat" value="Add Category">
    </form>
</div>

@endsection
