@extends('master')
@section('title',' - 	New Movie')
@section('content')

	<div class="row">
		<h1>{{ $movie->title }}{{ $movie->year }}</h1>
		<p>{{$movie->description}}</p>
		
	</div>



@endsection