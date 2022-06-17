<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} " aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/jurnalistik*') ? 'active' : '' }}" href="/dashboard/jurnalistik">
            <span data-feather="file-text"></span>
            Postingan Jurnalistik
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/sastra*') ? 'active' : '' }}" href="/dashboard/sastra">
            <span data-feather="book"></span>
            Postingan Sastra
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/fotografi*') ? 'active' : '' }}" href="/dashboard/fotografi">
            <span data-feather="camera"></span>
            Postingan Fotografi
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categoryjurnalistik*') ? 'active' : '' }} " aria-current="page" href="/dashboard/categoryjurnalistik">
            <span data-feather="grid"></span>
            Post Category Jurnalistik
          </a>
        </li>
    </div>
  </nav>