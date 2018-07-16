<nav class="navbar navbar-expand-md bg-white">
  <span class="navbar-brand"><a href="/">{{ config('app.name', 'Studentern') }}</a></span>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="" href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="" href="/articles">Latest</a>
      </li>
      <li class="nav-item">
        <a class="" href="/leaderboard">Leaderboard</a>
      </li>
      @guest
      <li class="nav-item">
        <a class="" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="" href="{{ route('register') }}">Register</a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a href="" onclick="event.preventDefault();">You <span class="fas fa-caret-down"></span></a>
        <div class="dropdown-container">
          <div class="animated fadeOutDown sdropdown-menu">
            <ul class="sdropdown-content">
              <li class="sdropdown-item"><a href="/dashboard">Dashboard</a></li>
              <li class="sdropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <a href="">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </div>
      </li>
      @endguest
    </ul>
  </div>

<div class="p-0 ml-auto navbar-toggler d-none d-sm-inline-block search-container">
  	<div class="search-box">
	  	<span id="searchButton" class="float-left fal fa-search"></span>
	  	<form class="search-form float-right mr-3">
	    	<input id="searchInput" type="text" class="form-control search-query" placeholder="Search Users">
		</form>
	</div>
  </div>
  <div class="navbar-toggler d-xs-inline-block d-md-inline-block p-0 submenu-expansion">
  	<div style="height:3.5em;line-height:3.5em;padding:0 1.3em;border-left: solid 1px rgba(160, 160, 160, 0.3);font-weight:bold;">
    	<span class="fal fa-bars" style="color: #aaaaaa;font-weight:900;"></span>
	</div>
  </div>
</nav>

<!-- Side Navigation -->

<nav class="sidenav">
  <section>
    {!!Form::open(['class' => 'fsearch-container'])!!}
			{{Form::text('placeholder', 'Search users')}}
		{!! Form::close() !!}
    <!-- <form action="" class="fsearch-container"> Comment this -> Method should be get and action /search for form 
      <input type="text" placeholder="Search users">
    </form> -->
  </section>
  <section>
    <ul class="sidenav-nav">
      <li class="nav-citem">
        <a href="/">Home</a>
      </li>
      @auth
      <li class="nav-citem">
        <a href="/dashboard">Dashboard</a>
      </li>
      @endguest
      <li class="nav-citem">
        <a href="/about">About</a>
      </li>
      <li class="nav-citem">
        <a class="" href="/articles">Latest</a>
      </li>
      <li class="nav-citem">
        <a class="" href="/leaderboard">Leaderboard</a>
      </li>
      @guest
      <li class="nav-citem">
        <a class="" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-citem">
        <a class="" href="{{ route('register') }}">Register</a>
      </li>
      @else 
      <li class="nav-citem">
        <a class="" href="" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
      @endguest
    </ul>
  </section>
  <section class="text-center">
    <a class="btn btn-outline-secondary" href="">Login with twitter</a>
  </section>
</nav>

<div class="fader">
  <div class="fader">
    
  </div>
</div>
