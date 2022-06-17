<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-2 ">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/asset/img/logo.png" width='40px' alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- Dropdown --}}
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item me-2">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" " href="/">Beranda</a>
          </li>

          {{-- Sastra --}}
          <li class="nav-item me-2">
            <a class="nav-link {{ Request::is('sastra') ? 'active' : '' }}" href="/sastra">Sastra</a>
          </li>

          {{-- Dropdown jurnal --}}
          {{-- <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ (__('category_jurnalistiks')) }}</a>
              <ul class="dropdown-menu">
                @foreach($categoryJurnalistik as $catjurnal)
                  <li>
                    <a href="" class="dropdown-item">Jurnalistik @if(count($catjurnal->parent)&raquo)@endif</a>
                    @if(count($catjurnal->parent))
                    @include('partials.parentcategoryjurnalistik', ['parent' => $parents->parent])
                    @endif
                  </li>
                @endforeach
              </ul>
          </li> --}}

          {{-- Jurnal --}}
          <li class="nav-item me-2">
            <a class="nav-link {{ Request::is('jurnalistik') ? 'active' : '' }}" href="/jurnalistik">Jurnalistik</a>
          </li>

          {{-- Fotografi --}}
          <li class="nav-item me-2">
            <a class="nav-link {{ Request::is('fotografi') ? 'active' : '' }}" href="/fotografi">Fotografi</a>
          </li>

          {{-- Tentang --}}
          <li class="nav-item me-2">
            <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="/tentang">Tentang</a>
          </li>
        </ul>


        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat Datang {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @can('admin')
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                @endcan
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
                </form>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
          @endauth
        </ul>


        {{-- Search Button --}}

        {{-- <div class="rounded-pill bg-white">
          <form class="d-flex" action="/jurnalistik">
            @if (request('categoryJurnalistik'))
              <input type="hidden" name="categoryJurnalistik" value="{{ request('categoryJurnalistik') }}">
            @endif
            <input class="form-control border-0 rounded-pill" type="search" name="search" value="{{ request('search') }}" placeholder="Carinya disini...">
            <button class="btn border-0 rounded-pill" type="submit">
              <img src="/asset/img/search.svg" alt="">
            </button>
          </form>
        </div>   --}}

        {{-- End Search --}}
      </div>
    </div>
  </nav>

  {{-- <script>
    $(document).ready(funcion(){
      $(#search).on('keyup', function()){
        val query= $(this).val();
        $.ajax({
          url:'search',
          type:'get',
          data:{'search':query},
          success:function(data);
        }
      )};
      // end ajax
    });
  </script> --}}