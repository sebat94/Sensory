<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @yield('styles')
  <script src="{{URL::to('../public/js/lib/jquery-2.1.4.min.js') }}" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::to('../public/css/bo/main.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::to('../public/css/font-awesome.min.css') }}">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/bo') }}">Sensory</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="activa item item_home"><a href="{{ URL::to('/bo') }}">Home</a></li>
          <li class="item item_publications"><a href="{{ URL::to('/bo/publications') }}">Publications</a></li>
          <li class="item item_research"><a href="{{ URL::to('/bo/research') }}">Research</a></li>
          <li class="item item_news"><a href="{{ URL::to('/bo/news') }}">News</a></li>
          <li class="item item_members"><a href="{{ URL::to('/bo/members') }}">Members</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <main>
    <div class="container-fluid">
      @yield('body')
      @yield('scripts')
    </div>
  </main>
</body>
</html>
