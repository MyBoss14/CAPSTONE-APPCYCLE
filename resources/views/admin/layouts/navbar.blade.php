<nav class="navbar navbar-expand-lg main-navbar" style="background-color: #4E784F;">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>

    </form>
    <ul class="navbar-nav navbar-right">


      <div class="card-body ml-1">
        <figure class="avatar  avatar-sm">
            <img alt="image" src="{{Auth::user()->image}}" class="rounded-circle object-fit-cover" style="size: 50px;">
        </figure>

      </div>
      <li class="dropdown ">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in</div>
            <a href="{{ route('admin.profile')}}" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a>


            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
          </div>

      </li>
    </ul>
</nav>
