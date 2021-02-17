<!DOCTYPE html>
<html lang="en">

@include('seller.layouts.head')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('seller.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('seller.layouts.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="p-4">
            @yield('main-content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @include('seller.layouts.footer')

</body>

</html>
