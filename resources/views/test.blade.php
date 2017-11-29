@extends('layouts.main')

@section('content')

{{$filename}}

<div>
    
    <img src="{{asset('storage/items/' .$filename)}}" />

</div>

@endsection
