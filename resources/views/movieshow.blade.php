@extends('master')
@section('title',' - 	New Movie')
@section('content')

	<div class="row">
		<h1>{{$movie->title}}</h1>
		<p>Released year{{$movie->year}}</p>
		<p><img src="{{asset(url('images/original/'.$movie->poster))}}"></p>
		<p>{{$movie->description}}</p>
		
	</div>	
@if(! Auth::guest())
@if (Auth::user()->role === 'admin')
	
	 <div class="row">
	 	<a href="/movies/{{$movie->id}}/edit" class="btn btn-info">Edit</a>
	 </div>
	 <div>
	 <form method="POST" action="/movies/{{$movie->id}}">
	 {{csrf_field()}}
	 <div class="row">
	 	<input type="hidden" name="_method" value="DELETE">
		<button class="btn btn-danger">Delete</button>
	</div>
	</form>
	</div>
@endif
@endif
@endsection