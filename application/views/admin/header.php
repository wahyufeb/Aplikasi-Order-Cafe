<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Document</title>
		<!-- bootstrap -->
		<!-- <link
			rel="stylesheet"
			href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css"
		/> -->
    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    	<!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

    <!-- datatables -->
    <link href="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>



    <!-- Page level plugins -->
    <!-- <script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url() ?>assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/demo/chart-pie-demo.js"></script> -->
    <script
      src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
      integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
      crossorigin="anonymous"
    ></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
	</head>
	<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>index.php/Administrator/Admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Pesanan
      </div>
      
      <!-- Pesanan Item --->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>index.php/Administrator/Admin/pesanan">
          <i class="fas fa-box-open"></i>
          <span>Konfirmasi Pesanan</span></a>
      </li>

      <!-- Pesanan Item --->
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>index.php/Administrator/Admin/allPesanan">
          <i class="fas fa-box-open"></i>
          <span>Daftar Pesanan</span></a>
      </li> -->
        <!-- Nav Item - Pages Collapse Menu
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?= base_url() ?>index.php/Administrator/Admin/pesanan" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pesanan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="buttons.html">Buttons</a>
              <a class="collapse-item" href="cards.html">Cards</a>
            </div>
          </div>
        </li> -->

        <!-- Transaksi Item --->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/Administrator/Admin/allTransaksi">
            <i class="far fa-credit-card"></i>
            <span>Transaksi</span></a>
        </li>
        
      <!-- Divider -->      
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Manajemen
      </div>

      <!-- Menu Item --->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>index.php/Administrator/Admin/menu">
          <i class="fas fa-utensils"></i>
          <span>Manajemen Menu</span></a>
      </li>

      <!-- Pengguna Item --->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>index.php/Administrator/Admin/pengguna">
          <i class="fas fa-user"></i>
          <span>Manajemen Pengguna</span></a>
      </li>
        <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Lainnya
      </div>
  
        <!-- Komentar Item --->
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-comments"></i>
            <span>Komentar</span></a>
          </li>
        

      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $userLog[0]['nama_lengkap'] ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/photo/<?= $userLog[0]['photo'] ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url() ?>index.php/Administrator/Admin/logout"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>logout</a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->