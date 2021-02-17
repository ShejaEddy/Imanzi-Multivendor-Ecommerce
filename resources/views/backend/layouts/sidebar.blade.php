<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      {{-- <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div> --}}
      <div class="sidebar-brand-text mx-3">Imanzi Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->routeIs('admin') ? 'active' : ''}}">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('file*') ? 'active' : ''}}" href="{{route('file-manager')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Media Manager</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed {{request()->routeIs('banner*') ? 'active' : ''}}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-image"></i>
        <span>Banners</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Banner Options:</h6>
          <a class="collapse-item {{Helper::activeRoute('banner.index')}}" href="{{route('banner.index')}}">All Banners</a>
          <a class="collapse-item {{Helper::activeRoute('banner.create')}}" href="{{route('banner.create')}}"><i class="fa fa-plus-circle mr-1"></i>Add New Banner</a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Shop
        </div>

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed {{request()->routeIs('category*') ? 'active' : ''}}" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item {{Helper::activeRoute('category.index')}}" href="{{route('category.index')}}">All categories</a>
            <a class="collapse-item {{Helper::activeRoute('category.create')}}" href="{{route('category.create')}}"><i class="fa fa-plus-circle mr-1"></i>Add New Category</a>
          </div>
        </div>
    </li>
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed {{Helper::activeRoute('*product*')}}" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
            <a class="collapse-item {{Helper::approvalStatus('admin.product.index')}}" href="{{route('admin.product.index')}}">All Products</a>
            <a class="collapse-item {{Helper::approvalStatus('admin.product.index','pending')}}" href="{{route('admin.product.index',['approval_status'=>'pending'])}}">Pending Products</a>
            <a class="collapse-item {{Helper::approvalStatus('admin.product.index','approved')}}" href="{{route('admin.product.index',['approval_status'=>'approved'])}}">Approved Products</a>
            <a class="collapse-item {{Helper::approvalStatus('admin.product.index','denied')}}" href="{{route('admin.product.index',['approval_status'=>'denied'])}}">Blocked Product</a>
          </div>
        </div>
    </li>

    {{-- Deals --}}
    <li class="nav-item {{Helper::activeRoute('admin.deal*')}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dealCollapse" aria-expanded="true" aria-controls="dealCollapse">
          <i class="fas fa-gift"></i>
          <span>Deals</span>
        </a>
        <div id="dealCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Deal Options:</h6>
            <a class="collapse-item {{Helper::dealStatus('admin.deal.index')}}" href="{{route('admin.deal.index')}}">All Deals</a>
            <a class="collapse-item {{Helper::dealStatus('admin.deal.index',false)}}" href="{{route('admin.deal.index', ['is_expired'=>false])}}">Active Deals</a>
            <a class="collapse-item {{Helper::dealStatus('admin.deal.index',true)}}" href="{{route('admin.deal.index', ['is_expired'=>true])}}">Expired Deals</a>
          </div>
        </div>
    </li>

    <!--Brands -->
    <li class="nav-item">
        <a class="nav-link {{Helper::activeRoute('admin.brand*')}}" href="{{route('admin.brand.index')}}">
            <i class="fas fa-table"></i>
            <span>Brands</span>
        </a>
    </li>

    <!--Shipping -->
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('*shipping*') ? 'active' : ''}}" href="{{route('admin.shipping.index')}}">
            <i class="fas fa-truck"></i>
            <span>Shipping</span>
        </a>
    </li>
    <!--Coupons -->
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('*coupon*') ? 'active' : ''}}" href="{{route('admin.coupon.index')}}">
            <i class="fas fa-cut"></i>
            <span>Coupons</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('review*') ? 'active' : ''}}" href="{{route('review.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
   <div class="sidebar-heading">
       Transactions
   </div>
   <!-- Orders -->
   <li class="nav-item {{request()->routeIs('order*') && !collect(request()->query())->has('is_deal') ? 'active' : ''}}">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productsOrderCollapse" aria-expanded="true" aria-controls="postCollapse">
         <i class="fas fa-chart-area"></i>
         <span>Products Transaction</span>
       </a>
       <div id="productsOrderCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Orders Options:</h6>
           <a class="collapse-item {{Helper::orderStatus('order.index')}}" href="{{route('order.index')}}">All Orders</a>
           <a class="collapse-item {{Helper::orderStatus('order.index','new')}}" href="{{route('order.index',['status'=>'new'])}}">New Orders</a>
           <a class="collapse-item {{Helper::orderStatus('order.index','delivered')}}" href="{{route('order.index',['status'=>'delivered'])}}">Success Orders</a>
           <a class="collapse-item {{Helper::orderStatus('order.index','process')}}" href="{{route('order.index',['status'=>'process'])}}">Processed Orders</a>
           <a class="collapse-item {{Helper::orderStatus('order.index','cancel')}}" href="{{route('order.index',['status'=>'cancel'])}}">Cancelled Orders</a>
           <a class="collapse-item {{Helper::orderStatus('order.index','returned')}}" href="{{route('order.index',['status'=>'returned'])}}">Returned Orders</a>
           <a class="collapse-item {{Helper::orderStatus('order.index','replaced')}}" href="{{route('order.index',['status'=>'replaced'])}}">Replaced Orders</a>
         </div>
       </div>
   </li>
   <li class="nav-item {{request()->routeIs('order*') && collect(request()->query())->has('is_deal') ? 'active' : ''}}">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dealsOrderCollapse" aria-expanded="true" aria-controls="postCollapse">
         <i class="fas fa-gift"></i>
         <span>Deals Transaction</span>
       </a>
       <div id="dealsOrderCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Orders Options:</h6>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['is_deal'=>true])}}">All Orders</a>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['status'=>'new','is_deal'=>true])}}">New Orders</a>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['status'=>'delivered','is_deal'=>true])}}">Success Orders</a>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['status'=>'processed','is_deal'=>true])}}">Processed Orders</a>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['status'=>'cancelled','is_deal'=>true])}}">Cancelled Orders</a>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['status'=>'returned','is_deal'=>true])}}">Replaced Orders</a>
           <a class="collapse-item {{Helper::OrderDealStatus('order.index')}}" href="{{route('order.index',['status'=>'replaced','is_deal'=>true])}}">Returned Orders</a>
         </div>
       </div>
   </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Posts
    </div>

    <!-- Posts -->
    <li class="nav-item {{request()->routeIs('post.*') ? 'active' : ''}}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
        <i class="fas fa-fw fa-folder"></i>
        <span>Blog Posts</span>
      </a>
      <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Post Options:</h6>
          <a class="collapse-item {{request()->routeIs('post.index') ? 'active' : ''}}" href="{{route('post.index')}}">All Posts</a>
          <a class="collapse-item {{request()->routeIs('post.create') ? 'active' : ''}}" href="{{route('post.create')}}"><i class="fa fa-plus-circle mr-1"></i>Add New Post</a>
        </div>
      </div>
    </li>

     <!-- Category -->
     <li class="nav-item {{request()->routeIs('post-category*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
          <i class="fas fa-sitemap fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item {{request()->routeIs('post-category.index') ? 'active' : ''}}" href="{{route('post-category.index')}}">All Post Categories</a>
            <a class="collapse-item {{request()->routeIs('post-category.create') ? 'active' : ''}}" href="{{route('post-category.create')}}"><i class="fa fa-plus-circle mr-1"></i>Add New Category</a>
          </div>
        </div>
      </li>

      <!-- Tags -->
    <li class="nav-item {{request()->routeIs('post-tag*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>Tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tag Options:</h6>
            <a class="collapse-item {{request()->routeIs('post-tag.index') ? 'active' : ''}}" href="{{route('post-tag.index')}}">All Post Tags</a>
            <a class="collapse-item {{request()->routeIs('post-tag.create') ? 'active' : ''}}" href="{{route('post-tag.create')}}"><i class="fa fa-plus-circle mr-1"></i>Add New Post Tag</a>
            </div>
        </div>
    </li>

      <!-- Comments -->
      <li class="nav-item {{request()->routeIs('comment*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
      </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>

     <!-- Users -->
    <li class="nav-item {{request()->routeIs('users*') ? 'active' : ''}}">
        <a class="nav-link collapsed" role="button" href="#userCollapse" data-toggle="collapse" aria-expanded="false" aria-controls="userCollapse">
          <i class="fas fa-users"></i>
          <span>Users</span>
        </a>
        <div id="userCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Options:</h6>
            <a class="collapse-item {{Helper::userRoute('user')}}" href="{{route('users.index',['role'=>'user'])}}">Clients</a>
            <a class="collapse-item {{Helper::userRoute('seller')}}" href="{{route('users.index',['role'=>'seller'])}}">Sellers</a>
            <a class="collapse-item {{Helper::userRoute('admin')}}" href="{{route('users.index',['role'=>'admin'])}}">Admins</a>
          </div>
        </div>
      </li>
     <!-- General settings -->
     <li class="nav-item {{request()->routeIs('settings') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
