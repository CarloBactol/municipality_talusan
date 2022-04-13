
<nav class="navbar navbar-expand-sm navbar-light bg-light shadow py-lg-4 py-md-4 py-sm-2 px-lg-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}"> <span class="text-lg">Municipality Of Talusan</span> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ '/' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ 'about-city' == request()->path() ? 'active' : '' }}" href="{{ url('about-city') }}">About City</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ 'barangay-list' == request()->path() ? 'active' : '' }}" href="{{ url('barangay-list') }}">Barangay</a>
          </li>
          <li class="nav-item dropdown {{ 'destinations-list' == request()->path() ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="{{ url('/destinations-list') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tourism
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ url('/destinations-list') }}">Destinations</a></li>
              <li><a class="dropdown-item" href="{{ url('/tradition') }}">Tradition</a></li>
              <li><a class="dropdown-item" href="{{ url('/food') }}">Food</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ 'contact' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
