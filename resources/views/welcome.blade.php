@extends('master')
@section('title',' - Home')
@section('content')  
       <div class="row">
        <div class="col-xs-12">
          <h1>Schlocktoberfest <small>The Best Worst Movie Festival Ever !</small></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <p class="lead">{{$caption}} Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. </p>  
          <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Film Programme</button>
          <button type="button" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Tickets (Coming Soon !)</button>
        </div>
        <div class="col-sm-6">
          <img src="https://placekitten.com/700/400" class="img-responsive" alt="Kitten Image">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <h3 class="text-center"> Best Worst Movie (2009) </h3>
          <p>This documentry reviews the making of film "Troll 2" from the perspective of its child artist, Michael.</p>
        </div>
        <div class="col-sm-4">
          <h3 class="text-center"> Movie Suggest </h3>

          <form class="form-horizontal" method="post" action="/movies/suggestmovie">
          {{csrf_field()}}
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" >
               
                  <span class="text-danger">{{$errors->first('email')}}</span>
              </div>
            </div>
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Movie Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Troll 2" name="title" ">
                
                <span class="text-danger">{{$errors->first('title')}}</span>
                
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="checkbox"> Subscribe for Schlocktoberfest Newsletter<small> Once a month!</small>
                  </label>
                </div>
              </div>
            </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Suggest Movie</button>
            </div>
          </div>
        </form>
        </div>
        <div class="col-sm-4">
          <h3 class="text-center"> Our Sponsors </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. </p>
        </div>
      </div>

@endsection