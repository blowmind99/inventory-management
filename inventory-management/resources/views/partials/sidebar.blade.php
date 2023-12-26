<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
      <!-- Side Header -->
      <div class="content-header justify-content-lg-center">
        <!-- Logo -->
        <div>
          <span class="smini-visible fw-bold tracking-wide fs-lg">
            c<span class="text-primary">b</span>
          </span>
          <a class="link-fx fw-bold tracking-wide mx-auto" href="/">
            <span class="smini-hidden">
              <i class="fa fa-fire text-primary"></i>
              <span class="fs-4 text-dual">fana</span><span class="fs-4 text-primary">tech</span>
            </span>
          </a>
        </div>
        <!-- END Logo -->

        <!-- Options -->
        <div>
          <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-fw fa-times"></i>
          </button>
          <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <div class="content-side content-side-full bg-body-light">
          
        </div>

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
          <ul class="nav-main">
            <li class="nav-main-heading">Dashboard</li>
            
            @if($user->role == 'superadmin')
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('/dashboard/inventori') }}">
                  <i class="nav-main-link-icon fa-solid fa-boxes-stacked"></i>
                  <span class="nav-main-link-name">Inventori</span>
                </a>
              </li>

              <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('/dashboard/sales') }}">
                  <i class="nav-main-link-icon fa-solid fa-shop"></i>
                  <span class="nav-main-link-name">Sales</span>
                </a>
              </li>

              <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('/dashboard/purchase') }}">
                  <i class="nav-main-link-icon fa-solid fa-basket-shopping"></i>
                  <span class="nav-main-link-name">Purchase</span>
                </a>
              </li>
            @elseif($user->role == 'manager')
              <li class="nav-main-item">
                <a class="nav-main-link" href="">
                  <i class="nav-main-link-icon fa-solid fa-shop"></i>
                  <span class="nav-main-link-name">Sales</span>
                </a>
              </li>

              <li class="nav-main-item">
                <a class="nav-main-link" href="">
                  <i class="nav-main-link-icon fa-solid fa-basket-shopping"></i>
                  <span class="nav-main-link-name">Purchase</span>
                </a>
              </li>
            @elseif($user->role == 'sales')
              <li class="nav-main-item">
                <a class="nav-main-link" href="">
                  <i class="nav-main-link-icon fa-solid fa-shop"></i>
                  <span class="nav-main-link-name">Sales</span>
                </a>
            </li>
            @elseif($user->role == 'purchase')
              <li class="nav-main-item">
                <a class="nav-main-link" href="">
                  <i class="nav-main-link-icon fa-solid fa-basket-shopping"></i>
                  <span class="nav-main-link-name">Purchase</span>
                </a>
              </li>
            @endif
          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->