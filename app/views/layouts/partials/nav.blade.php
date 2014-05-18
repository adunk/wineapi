
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">WineAPI</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ set_active('/') }}"><a href="/">Home</a></li>
        @if (Auth::guest())
          <li class="{{ set_active('register') }}"><a href="/register">Register</a></li>
          <li class="{{ set_active('login') }}"><a href="/login">Login</a></li>
          <li class="{{ set_active('password/remind') }}"><a href="/password/remind">Reset</a></li>
        @else
          <li>{{ link_to_profle() }}</li>
          <li><a href="/logout">Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</div>