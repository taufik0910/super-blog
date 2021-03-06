<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fa fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <router-link to="/" class="nav-link">
                <i class="nav-icon fa fa-dashboard"></i>
                <img src="{{asset('assets/admin/default/images.png')}}"
                alt="AdminLTE Logo"
                height="70px"
                width="70px"
                class="brand-image img-circle elevation-3"
                style="opacity: .8">
                <b><h3 class="brand-text font-weight-light">{{Auth::user()->name}}</h3></b>
                
            </router-link>
            
            
            
            <!-- Sidebar -->
            <div class="sidebar">
                
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview">
                                <router-link to="/" class="nav-link">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/category-list" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        Category
                                        
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/post-list"  class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        Post
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </router-link>
                            </li>
                            
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <admin-main></admin-main>
            </div>
            <!-- /.content-wrapper -->
            
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2020 <a href="https://github.com/taufik0910">FullStack Web</a>.</strong> All rights
                reserved.
            </footer>
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
    </html>