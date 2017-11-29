@extends('layouts.main')

@section('content')

<div class="container">
    <ul>
        @foreach($items as $item)
        <li>{{$item->name}}</li>
        @endforeach
    </ul>

</div>
@endsection
