@extends('master')
@section('title',' - Movies')
@section('content')

<div class="row">
		<div class="col-xs-12">
			  <h1>Schlocktoberfest <small>The Best Worst Movie Festival Ever !</small></h1>
			  <h2>Movies</h2>

	@if (Auth::user()->role ==='admin')
			  
			<a href="/movies/create" class="btn btn-default">Add Movie</a>

	  
 	@endif
		</div>
	@if(count($movies)>0)
	
			@foreach($movies as $movie)
				<li><a href="/movies/{{$movie->title}}">{{$movie->title}} {{"-"}} {{$movie->year}}</a></li>
			@endforeach
		
	@else
		<p>Weirdly enough!!!No records to dispaly.</p>
	@endif
</div>
<div class="text-center">
	{{$movies->links()}}
</div>





@endsection