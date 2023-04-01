<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark">
        <a href=".">
          <img src="{{asset('logo/logo.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
        </a>
      </h1>
      <div class="navbar-nav flex-row d-lg-none">
        <div class="nav-item d-none d-lg-flex me-3">
          <div class="btn-list">

          </div>
        </div>
        <div class="d-none d-lg-flex">
          <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
          </a>
          <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
          </a>
          <div class="nav-item dropdown d-none d-md-flex me-3">

          </div>
        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" style="background-image: url({{asset('assets/image/default_profile.jpg')}})"></span>
            <div class="d-none d-xl-block ps-2">
              <div>{{Auth::user()->name}}</div>
              <div class="mt-1 small text-muted">Administrator</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="navbar-nav pt-lg-3">
          <li class="nav-item @if(Request::routeIs('dashboard')) active @endif">
            <a class="nav-link" href="{{route('dashboard')}}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
              </span>
              <span class="nav-link-title">
                Dashboard
              </span>
            </a>
          </li>
          <li class="nav-item dropdown @if(Request::is('dashboard/member*')) active @endif">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Anggota
              </span>
            </a>
            <div class="dropdown-menu @if(Request::is('dashboard/member*')) show @endif">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <a class="dropdown-item @if(Request::routeIs('member.index', 'member.edit', 'member.detail')) active @endif" href="{{route('member.index')}}">
                    List
                  </a>
                  <a class="dropdown-item @if(Request::routeIs('category')) active @endif" href="{{route('category')}}">
                    Kategori
                  </a>
                  <a class="dropdown-item @if(Request::routeIs('member.create')) active @endif" href="{{route('member.create')}}">
                    Tambah Anggota
                  </a>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item @if(Request::routeIs('encrypt.index')) active @endif">
            <a class="nav-link" href="{{route('encrypt.index')}}" >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-key" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M21 12a9 9 0 1 1 -18 0a9 9 0 0 1 18 0z"></path>
                    <path d="M12.5 11.5l-4 4l1.5 1.5"></path>
                    <path d="M12 15l-1.5 -1.5"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Enkripsi
              </span>
            </a>
          </li>
          <li class="nav-item dropdown @if(Request::is('dashboard/candidate*')) active @endif">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-address-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z"></path>
                    <path d="M10 16h6"></path>
                    <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M4 8h3"></path>
                    <path d="M4 12h3"></path>
                    <path d="M4 16h3"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Kandidat
              </span>
            </a>
            <div class="dropdown-menu @if(Request::is('dashboard/candidate*')) show @endif">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <a class="dropdown-item @if(Request::routeIs('candidate.create')) active @endif" href="{{route('candidate.create')}}">
                    Pendaftaran
                  </a>
                  <a class="dropdown-item @if(Request::routeIs('candidate.index')) active @endif" href="{{route('candidate.index')}}">
                    List
                  </a>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown @if(Request::is('dashboard/voting*')) active @endif">
            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                    <path d="M18 14v4h4"></path>
                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                    <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path d="M8 11h4"></path>
                    <path d="M8 15h3"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Voting
              </span>
            </a>
            <div class="dropdown-menu @if(Request::is('dashboard/voting*')) show @endif">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                  <a class="dropdown-item @if(Request::routeIs('voting.index')) active @endif" href="{{route('voting.index')}}">
                    List Voting
                  </a>
                  <a class="dropdown-item @if(Request::routeIs('voting.result')) active @endif" href="{{route('voting.result')}}">
                    Hasil
                  </a>
                </div>
              </div>
            </div>
          </li>


        </ul>
      </div>
    </div>
</aside>
