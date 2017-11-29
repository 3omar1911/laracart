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
    <form method="post" action="/items" enctype= multipart/form-data>
        {{ csrf_field() }}
        <label>Item Name: </label>
        <input type="text" name="name">
        <br>

        <label>Item Price: </label>
        <input type="text" name="price">
        <br>


        <label>Select Category: </label>
        <!-- <select name="catName"> -->

        	@foreach($categories as $cat)
			<!-- <option value="{{$cat->id}}">{{$cat->name}}</option> -->
			<input type="checkbox" name="catName[]" value="{{$cat->id}}">{{$cat->name}}<br>
		  	@endforeach

		<!-- </select> -->
		<br>
		<input type="file" name="img">

        <input type="submit" name="addItem" value="Add Item">
    </form>
</div>

@endsection
