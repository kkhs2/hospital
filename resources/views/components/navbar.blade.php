<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">  
<a class="navbar-brand">HospitalApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      @if (!session('staff'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Login</a>
          </li>
      @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Account</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Information
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ url('information/news') }}">Headline News</a>
              <a class="dropdown-item" href="{{ url('information/conditions') }}">Conditions</a>
              <a class="dropdown-item" href="{{ url('information/live-well') }}">Live Well</a>
              <a class="dropdown-item" href="{{ url('information/medicines') }}">Medicines</a>
              <a class="dropdown-item" href="{{ url('information/video') }}">Video</a>
              <a class="dropdown-item" href="{{ url('information/search') }}">Search</a>
              <a class="dropdown-item" href="{{ url('information/data') }}">Organisation</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">Log Out</a>
          </li>
      @endif
      </li>
    </ul>
  </div>
</div>
</nav>