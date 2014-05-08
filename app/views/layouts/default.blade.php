<!doctype html>
<html lang="en">
  <head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	  <title>@yield('meta-title', 'WineAPI - Find Wineries in Napa!')</title>
	  
	  <!-- Stylesheets -->
	  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	  <link href="/css/app.css" rel="stylesheet">
	  
	  <!-- Javascript -->
	  <script src="/bower_components/angular/angular.js"></script>
	  <script src="/bower_components/fastclick/lib/fastclick.js"></script>
	  
	  <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7PukrZRJRvda_PcxmIf4bByvx4Icdqao&sensor=false">
    </script>
	  
	  <script src="/js/map.js"></script>
	  <script src="/js/app.js"></script>
	  <script src="/js/controllers.js"></script>
	  <script src="/js/services.js"></script>
  </head>

  <body ng-app="wineapi">
    
    @include('layouts.partials.nav')
    
    <main role="main">
      <div class="layout">
        @yield('content')
      </div>
    </main>
    
    @include('layouts.partials.footer')
    
  </body>
</html>    
    