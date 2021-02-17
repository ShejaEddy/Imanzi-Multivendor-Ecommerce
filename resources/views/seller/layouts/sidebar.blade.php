<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      {{-- <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div> --}}
      <div class="sidebar-brand-text">Imanzi Seller</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->routeIs('seller') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('seller')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Shop
    </div>

    {{-- Products --}}
    <li class="nav-item {{request()->routeIs('product*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
            <a class="collapse-item {{Helper::approvalStatus('product.index')}}" href="{{route('product.index')}}">All Products</a>
            <a class="collapse-item {{Helper::approvalStatus('product.index','pending')}}" href="{{route('product.index', ['approval_status'=>'pending'])}}">Pending Products</a>
            <a class="collapse-item {{Helper::approvalStatus('product.index','approved')}}" href="{{route('product.index', ['approval_status'=>'approved'])}}&">Approved Products</a>
            <a class="collapse-item {{Helper::approvalStatus('product.index','denied')}}" href="{{route('product.index', ['approval_status'=>'denied'])}}">Blocked Products</a>
            <a class="collapse-item {{Helper::activeRoute('product.create')}}" href="{{route('product.create')}}"><i class=" fa fa-plus-circle mr-1"></i> Add New Product</a>


          </div>
        </div>
    </li>

    {{-- Deals --}}
    <li class="nav-item {{Helper::activeRoute('deal*')}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dealCollapse" aria-expanded="true" aria-controls="dealCollapse">
          <i class="fas fa-gift"></i>
          <span>Deals</span>
        </a>
        <div id="dealCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Deal Options:</h6>
            <a class="collapse-item {{Helper::dealStatus('deal.index')}}" href="{{route('deal.index')}}">All Deals</a>
            <a class="collapse-item {{Helper::dealStatus('deal.index',false)}}" href="{{route('deal.index', ['is_expired'=>false])}}">Active Deals</a>
            <a class="collapse-item {{Helper::dealStatus('deal.index',true)}}" href="{{route('deal.index', ['is_expired'=>true])}}">Expired Deals</a>
            <a class="collapse-item {{Helper::activeRoute('deal.create')}}" href="{{route('deal.create')}}"><i class=" fa fa-plus-circle mr-1"></i>Add New Deal</a>
          </div>
        </div>
    </li>

    {{-- Brands --}}
    <li class="nav-item {{request()->routeIs('brand*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
          <i class="fas fa-table"></i>
          <span>Brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Brand Options:</h6>
            <a class="collapse-item {{request()->routeIs('brand.index') ? 'active':''}}" href="{{route('brand.index')}}">Brands</a>
            <a class="collapse-item {{request()->routeIs('brand.create') ? 'active':''}}" href="{{route('brand.create')}}"><i class=" fa fa-plus-circle mr-1"></i>Add New Brand</a>
          </div>
        </div>
    </li>

    {{-- Shipping --}}
    <li class="nav-item {{request()->routeIs('shipping*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">
          <i class="fas fa-truck"></i>
          <span>Shipping</span>
        </a>
        <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Shipping Options:</h6>
            <a class="collapse-item {{request()->routeIs('shipping.index') ? 'active':''}}" href="{{route('shipping.index')}}">Shipping</a>
            <a class="collapse-item {{request()->routeIs('shipping.create') ? 'active':''}}" href="{{route('shipping.create')}}"><i class=" fa fa-plus-circle mr-1"></i>Add New Shipping</a>
          </div>
        </div>
    </li>

    <!-- Reviews -->
    <li class="nav-item {{request()->routeIs('seller.review*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('seller.review.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>


    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        Transactions
    </div>
    <!-- Orders -->
    <li class="nav-item {{request()->routeIs('seller.orders*') && !collect(request()->query())->has('is_deal') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productsOrderCollapse" aria-expanded="true" aria-controls="postCollapse">
          <i class="fas fa-chart-area"></i>
          <span>Products Transaction</span>
        </a>
        <div id="productsOrderCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders Options:</h6>
            <a class="collapse-item {{Helper::orderStatus('seller.orders.index')}}" href="{{route('seller.orders.index')}}">All Orders</a>
            <a class="collapse-item  {{Helper::orderStatus('seller.orders.index','new')}}" href="{{route('seller.orders.index',['status'=>'new'])}}">New Orders</a>
            <a class="collapse-item {{Helper::orderStatus('seller.orders.index','delivered')}}" href="{{route('seller.orders.index',['status'=>'delivered'])}}">Success Orders</a>
            <a class="collapse-item {{Helper::orderStatus('seller.orders.index','process')}}" href="{{route('seller.orders.index',['status'=>'process'])}}">Processed Orders</a>
            <a class="collapse-item {{Helper::orderStatus('seller.orders.index','cancel')}}" href="{{route('seller.orders.index',['status'=>'cancel'])}}">Cancelled Orders</a>
            <a class="collapse-item {{Helper::orderStatus('seller.orders.index','returned')}}" href="{{route('seller.orders.index',['status'=>'returned'])}}">Returned Orders</a>
            <a class="collapse-item {{Helper::orderStatus('seller.orders.index','replaced')}}" href="{{route('seller.orders.index',['status'=>'replaced'])}}">Replaced Orders</a>
          </div>
        </div>
    </li>
    <li class="nav-item {{request()->routeIs('seller.orders*') && collect(request()->query())->has('is_deal') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dealsOrderCollapse" aria-expanded="true" aria-controls="postCollapse">
          <i class="fas fa-gift"></i>
          <span>Deals Transaction</span>
        </a>
        <div id="dealsOrderCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders Options:</h6>
            <a class="collapse-item  {{Helper::OrderDealStatus('seller.orders.index',)}}" href="{{route('seller.orders.index',['is_deal'=>true])}}">All Orders</a>
            <a class="collapse-item {{Helper::OrderDealStatus('seller.orders.index','delivered')}}" href="{{route('seller.orders.index',['status'=>'delivered','is_deal'=>true])}}">Success Orders</a>
            <a class="collapse-item {{Helper::OrderDealStatus('seller.orders.index','new')}}" href="{{route('seller.orders.index',['status'=>'new','is_deal'=>true])}}">Hold Orders</a>
            <a class="collapse-item {{Helper::OrderDealStatus('seller.orders.index','process')}}" href="{{route('seller.orders.index',['status'=>'process','is_deal'=>true])}}">Processed Orders</a>
            <a class="collapse-item {{Helper::OrderDealStatus('seller.orders.index','cancel')}}" href="{{route('seller.orders.index',['status'=>'cancel','is_deal'=>true])}}">Cancelled Orders</a>
            <a class="collapse-item {{Helper::OrderDealStatus('seller.orders.index','returned')}}" href="{{route('seller.orders.index',['status'=>'returned','is_deal'=>true])}}">Returned Orders</a>
            <a class="collapse-item {{Helper::OrderDealStatus('seller.orders.index','replaced')}}" href="{{route('seller.orders.index',['status'=>'replaced','is_deal'=>true])}}">Returned Orders</a>
          </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>
      <li class="nav-item {{Helper::activeRoute('coupon.*')}}">
        <a class="nav-link" href="{{route('coupon.index')}}">
            <i class="fas fa-cut"></i>
            <span>Coupons</span></a>
      </li>
     <!-- General settings -->
     <li class="nav-item {{Helper::activeRoute('seller.settings')}}">
        <a class="nav-link" href="{{route('seller.settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
