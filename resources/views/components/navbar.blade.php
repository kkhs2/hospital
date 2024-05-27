<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Home</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link" href="{{ url('mysettings') }}">My Settings</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('logout') }}" class="nav-link" href="#">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>