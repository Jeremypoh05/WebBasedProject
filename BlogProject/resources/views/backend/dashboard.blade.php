<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Blog -Admin</title>
    
         <!-- Bootstrap core CSS-->
        <link href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="{{asset('backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('backend')}}/css/sb-admin.css" rel="stylesheet">

    </head>

   <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.html">Laravel Blog</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('admin/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- Category -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list"></i>
            <span>Category</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('admin/category')}}">View All</a>
            <a class="dropdown-item" href="{{url('admin/category/create')}}">Add New</a>
          </div>
        </li>
        <!-- Post -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Post</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('admin/post')}}">View All</a>
            <a class="dropdown-item" href="{{url('admin/post/create')}}">Add New</a>
          </div>
        </li>
        <!-- Comments -->
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/comment')}}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Comments</span>
          </a>
        </li>
        <!-- Users -->
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/user')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
          </a>
        </li>
        <!-- Settings -->
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/setting')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
          </a>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/logout')}}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>

  <div id="content-wrapper">

      <!-- Content -->
      <div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>

<!-- Icon Cards-->
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-list"></i>
        </div>
        <div class="mr-5">Categories</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-address-card"></i>
        </div>
        <div class="mr-5"></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
        <div class="mr-5"> Comments</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-users"></i>
        </div>
        <div class="mr-5">Users</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div>

  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Recent Posts</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Title</th>
              <th>Image</th>
              <th>Full</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Title</th>
              <th>Image</th>
              <th>Full</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
         
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><img src="" width="100" /></td>
                <td><img src="" width="100" /></td>
                <td>
                  <a class="btn btn-info btn-sm" href="">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="">Delete</a>
                </td>
              </tr>
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

</div>
<!-- /.container-fluid -->

    <!-- Sticky Footer -->
      <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
      </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend')}}/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>
    <script src="{{asset('backend')}}/js/demo/chart-area-demo.js"></script>

    </body>
</html>
