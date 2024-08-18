<div class="dashboard_sidebar" style="background-color:#4E784F ;">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="javascript:;" class=" mt-3" style="margin-left: 10px;"><img src="{{asset('frontend/images/logo4.png')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a class="" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
      <li><a class="" href="{{route('home')}}"><i class="fas fa-home"></i>Home Page</a></li>
      <li><a class="" href="{{route('user.message.index')}}"><i class="fas fa-envelope"></i>Messages</a></li>


      @if (auth()->user()->role == 'seller')
        <li><a class="" href="{{route('seller.dashboard')}}"><i class="fas fa-tachometer"></i>Seller Account Dashboard</a></li>
      @endif


      <li><a href="{{route('user.orders')}}"><i class="fas fa-list-ul"></i> Orders</a></li>

      <li><a href="{{route('user.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
        @if (auth()->user()->role !== 'seller')
            <li><a href="{{route('user.seller-request')}}"><i class="far fa-handshake"></i> Request to be a Seller</a></li>
        @endif


      <li><a href="{{route('user.address.index')}}"><i class="fas fa-address-card"></i> Addresses</a></li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}"
            onclick="event.preventDefault();
            this.closest('form').submit();"
            ><i class="far fa-sign-out-alt"></i> Log out</a>
        </form>


      </li>
    </ul>
  </div>
