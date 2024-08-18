

<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('home')}}">APPCycle</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
              <a href="{{route('admin.dashboard')}}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
            <li class="menu-header">Starter</li>

            <li class="dropdown {{setActive([
                'admin.category.*'
                //'admin.slider.*', --if may dagdag
                ])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-recycle"></i><span>Manage Categories</span></a>
                <ul class="dropdown-menu" style="background-color: #a2dba3">
                  <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}" >Category</a></li>


                </ul>
            </li>

            <li class="dropdown {{setActive([
                'admin.slider.*'
                //'admin.slider.*', --if may dagdag
                ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store-alt"></i> <span>Manage Store</span></a>
              <ul class="dropdown-menu"  style="background-color: #a2dba3">
                <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{route('admin.slider.index')}}" >Slider</a></li>
              </ul>
            </li>


            <li class="dropdown {{setActive([
                'admin.products.*',
                'admin.sellers-product.*',
                'admin.pending-product.*',
                'admin.disapproved-product.*'

                //'admin.slider.*', --if may dagdag
                ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box-open"></i><span>Manage Product</span></a>
              <ul class="dropdown-menu"  style="background-color: #a2dba3">
                <li class="{{setActive(['admin.products.*'])}}"><a class="nav-link" href="{{route('admin.products.index')}}">Product</a></li>
                <li class="{{setActive(['admin.sellers-product.*'])}}"><a class="nav-link" href="{{route('admin.sellers-product.index')}}">Sellers Product</a></li>
                <li class="{{setActive(['admin.pending-product.*'])}}"><a class="nav-link" href="{{route('admin.pending-product.index')}}">Pending Product</a></li>
                <li class="{{setActive(['admin.disapproved-product.*'])}}"><a class="nav-link" href="{{route('admin.disapproved-product.index')}}">Diapproved Product</a></li>
              </ul>
            </li>

            <li class="dropdown {{setActive([
                'admin.seller-profile.*',
                'admin.payment-setting.*',
                'admin.shipping-rule.*',
                'admin.flash-sale.*'

                ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-app-store-ios"></i> <span>E-Commerce</span></a>
              <ul class="dropdown-menu" style="background-color: #a2dba3">
                <li class="{{setActive(['admin.seller-profile.*'])}}"><a class="nav-link" href="{{route('admin.seller-profile.index')}}">Shop Profile</a></li>
                <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{route('admin.flash-sale.index')}}"> Feature Product</a></li>
                <li class="{{setActive(['admin.shipping-rule.*'])}}"><a class="nav-link" href="{{route('admin.shipping-rule.index')}}"> Shipping Rule</a></li>
                <li class="{{setActive(['admin.payment-setting.*'])}}"><a class="nav-link" href="{{route('admin.payment-setting.index')}}"> Payment Settings</a></li>
              </ul>
            </li>

            <li class="dropdown {{setActive([
                'admin.seller-request.*',
                'admin.customers.*',
                'admin.seller.*'


                ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Current Users</span></a>
              <ul class="dropdown-menu" style="background-color: #a2dba3">
                <li class="{{setActive(['admin.seller-request.*'])}}"><a class="nav-link" href="{{route('admin.seller-request.index')}}">Pending Sellers</a></li>

                <li class="{{setActive(['admin.customers.*'])}}"><a class="nav-link" href="{{route('admin.customers.index')}}">Regular Users</a></li>

                <li class="{{setActive(['admin.seller.*'])}}"><a class="nav-link" href="{{route('admin.seller.index')}}">Seller List</a></li>

              </ul>
            </li>

            <li class="dropdown {{setActive([
                'admin.order.*',
                'admin.pending-orders',
                'admin.processed-orders',
                'admin.dropped-off-orders',
                'admin.shipped-orders',
                'admin.out-for-delivery-orders',
                'admin.delivered-orders',
                'admin.cancelled-orders'




                ])}}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Orders</span></a>


              <ul class="dropdown-menu" style="background-color: #a2dba3">
                <li class="{{setActive(['admin.order.*'])}}"><a class="nav-link" href="{{route('admin.order.index')}}">All orders</a></li>

                <li class="{{setActive(['admin.pending-orders'])}}"><a class="nav-link" href="{{route('admin.pending-orders')}}">Pending orders</a></li>

                <li class="{{setActive(['admin.processed-orders'])}}"><a class="nav-link" href="{{route('admin.processed-orders')}}">Processed orders</a></li>

                <li class="{{setActive(['admin.dropped-off-orders'])}}"><a class="nav-link" href="{{route('admin.dropped-off-orders')}}">Dropped Off Orders</a></li>

                <li class="{{setActive(['admin.shipped-orders'])}}"><a class="nav-link" href="{{route('admin.shipped-orders')}}">Shipped Orders</a></li>

                <li class="{{setActive(['admin.out-for-delivery-orders'])}}"><a class="nav-link" href="{{route('admin.out-for-delivery-orders')}}">Out for Delivery</a></li>

                <li class="{{setActive(['admin.cancelled-orders'])}}"><a class="nav-link" href="{{route('admin.cancelled-orders')}}">Cancelled Orders</a></li>

              </ul>

            </li>

            <li class="{{setActive(['admin.transaction'])}}"><a class="nav-link" href="{{route('admin.transaction')}}"><i class="fas fa-file-invoice"></i><span>Transactions</span></a></li>

            <li class="{{setActive(['admin.settings.index'])}}"><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="fas fa-sliders-h"></i><span>Settings</span></a></li>

            <li class="{{setActive(['admin.message.index'])}}"><a class="nav-link" href="{{route('admin.message.index')}}"><i class="fas fa-comment-alt"></i><span>Messages</span></a></li>

            <li class="{{setActive(['admin.terms-and-conditions'])}}"><a class="nav-link" href="{{route('admin.terms-and-conditions')}}"><i class="fas fa-comment-alt"></i><span>Terms and Conditions</span></a></li>







          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="javascript:;" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-recycle"></i> Circular Economy
            </a>
          </div>
        </aside>
      </div>
