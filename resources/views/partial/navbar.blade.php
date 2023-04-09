<nav class="navbar navbar-dark navbar-fixed-top navbar-default navbar-expand-lg bg-primary sticky-top" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="/">Laravel x Bootstrap</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "About") ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  {{ ($active === "categories") ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/categories">Categories</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "blog") ? 'active' : '' }}" href="/blog">blog</a>
          </li>
        </ul>
        @if ($active === "blog")
          <form class="d-flex" action="/{{ $active }}" role="search" method="get">
            @if (request('category')) 
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        @endif
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle  {{ ($active === "categories") ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-window-sidebar"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button class="dropdown-item"><i class="bi bi-box-arrow-up-left"></i> Log out</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a href="/login" class="btn btn-outline-light {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-down-right"></i> Login</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>
