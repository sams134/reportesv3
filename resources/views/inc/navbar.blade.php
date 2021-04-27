<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">Cl&iacute;nica de Motres El&eacute;ctricos</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      @guest
        <li class="active"><a href="/">Home</a></li>
      @else
        <li class="active"><a href="/dashboard">Home</a></li>
      @endguest
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="/firstSite/public/about">Quienes somos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="/posts">Posts</a></li>
        <li><a href="/posts/create">Create Post</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
          <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"> <span class="glyphicon glyphicon-log-in">Login</a></li>
                            <li><a href="{{ route('register') }}"> <span class="glyphicon glyphicon-user"></span> Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
      </ul>
    </div>
  </div>
</nav>
