@extends('master')
@section('title',' - CreateMovies')
@section('content')
<div class="row">
<div class="col-xs-12">
<h1>{{$state}} Movie</h1>
 @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="POST" action="{{$action}}" enctype="multipart/form-data">
	{{csrf_field()}}
	@if($state==="Edit")
	<input type="hidden" name="_method" value="PUT">
	@endif
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">	Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" placeholder="Troll" value="{{$state==='Edit'?$movie->title:old('title')}}">
				<span class="text-danger">{{$errors->first('title')}}</span>
			</div>
		</div>	

		<div class="form-group">
			<label for="year" class="col-sm-2 control-label">Year</label>
			<div class="col-sm-10">
			<input type="text"  class="form-control" name="year" id="year" placeholder="2016" value="{{$state==='Edit'?$movie->year:old('year')}}">
			<span class="text-danger">{{$errors->first('year')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
			<textarea id="description" placeholder="A paragrph about the movie"  class="form-control" name="description">{{$state==='Edit'?$movie->description:old('description')}}</textarea>
			<span class="text-danger">{{$errors->first('description')}}</span>
			</div>
		</div>

		<div class="form-group">
			<label for="poster" class="col-sm-2 control-label"  class="form-control"  value="{{old('poster')}}">Poster</label>
			<div class="col-sm-10">
			<input type="file" name="poster" id="poster">
			<span class="text-danger">{{$errors->first('poster')}}</span>
			</div>
		</div>

		<button type="submit" class="btn btn-info">{{$state}} Movie</button>			
	</form>
</div>
</div>




@endsection