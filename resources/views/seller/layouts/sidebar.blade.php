<div class="dashboard_sidebar" style="background-color: #375F38;">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="javascript:;" class=" mt-3" style="margin-left: 10px;"><img src="{{asset('frontend/images/logo4.png')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a class="" href="{{route('seller.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
      <li><a class="" href="{{route('home')}}"><i class="fas fa-tachometer"></i>Home Page</a></li>
      <li><a class="" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>User Account Dashboard</a></li>
      <li><a class="" href="{{route('seller.message.index')}}"><i class="fas fa-tachometer"></i>Message</a></li>
      <li><a href="{{route('seller.orders')}}"><i class="far fa-user"></i>Orders</a></li>
      <li><a href="{{route('seller.products.index')}}"><i class="far fa-user"></i>My Products</a></li>
      <li><a href="{{route('seller.disapproved-products')}}"><i class="far fa-user"></i>Disapproved Products</a></li>

      <li>
      <li><a href="{{route('seller.seller-profile.index')}}"><i class="far fa-user"></i>Shop Profile</a></li>
      <li><a href="{{route('seller.profile')}}"><i class="far fa-user"></i>Profile</a></li>
      <li><a href="{{route('seller.transaction.index')}}"><i class="far fa-user"></i>Transactions</a></li>


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
