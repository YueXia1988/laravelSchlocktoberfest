<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>
    <div class="container">

      @include('partials._nav')

      @yield('content')

      <hr>

      @include('partials._footer')

    </div> 

      @include('partials._scripts')
      
  </body>
</html>
