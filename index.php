<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_username"];
	  $data_level = $_SESSION["ses_level"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SI - IZIN SANTRI</title>
	<link rel="icon" href="dist/img/izin.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<!-- Datetimepicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<b>Sistem Informasi Perizinan Santri</b>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/izin.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text">IZIN SANTRI</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/pic.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
          if ($data_level=="Administrator"){
        ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cogs"></i>
								<p>
									Kelola Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-santri" class="nav-link">
										<i class="nav-icon far fa-circle text-success"></i>
										<p>Data Santri</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-asrama" class="nav-link">
										<i class="nav-icon far fa-circle text-success"></i>
										<p>Data Asrama</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="?page=data-izin" class="nav-link">
								<i class="nav-icon far fa fa-edit"></i>
								<p>
									Perizinan Santri
									<span class="badge badge-warning">
										Sirkulasi
									</span>
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=log-izin" class="nav-link">
								<i class="nav-icon far fa fa-file"></i>
								<p>
									Log Perizinan
								</p>
							</a>
						</li>

						<li class="nav-header">Setting</li>
						<li class="nav-item">
							<a href="?page=data-notifikasi" class="nav-link">
								<i class="nav-icon far fa fa-bell"></i>
								<p>
									Notifikasi
									<span class="badge badge-info">
										Telegram
									</span>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=data-pengguna" class="nav-link">
								<i class="nav-icon far fa-user"></i>
								<p>
									Users
								</p>
							</a>
						</li>

						<?php
          				} elseif($data_level=="Petugas"){
          				?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=ptg-data-izin" class="nav-link">
								<i class="nav-icon far fa fa-edit"></i>
								<p>
									Perizinan Santri
									<span class="badge badge-warning">
										Sirkulasi
									</span>
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?page=ptg-log-izin" class="nav-link">
								<i class="nav-icon far fa fa-file"></i>
								<p>
									Log Perizinan
								</p>
							</a>
						</li>

						<li class="nav-header">Setting</li>

						<?php
							}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              	case 'admin':
                  include "home/admin.php";
                  break;
				case 'petugas':
                  include "home/petugas.php";
				  break;
				
				//Notifikasi
				case 'data-notifikasi':
					include "admin/notifikasi/data_not.php";
					break;
				case 'edit-notifikasi':
					include "admin/notifikasi/edit_not.php";
					break;

				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;

				//Asrama
				case 'data-asrama':
					include "admin/asrama/data_asrama.php";
					break;
				case 'add-asrama':
					include "admin/asrama/add_asrama.php";
					break;
				case 'edit-asrama':
					include "admin/asrama/edit_asrama.php";
					break;
				case 'del-asrama':
					include "admin/asrama/del_asrama.php";
					break;

					//Asrama
				case 'data-santri':
					include "admin/santri/data_santri.php";
					break;
				case 'add-santri':
					include "admin/santri/add_santri.php";
					break;
				case 'edit-santri':
					include "admin/santri/edit_santri.php";
					break;
				case 'del-santri':
					include "admin/santri/del_santri.php";
					break;

				//Asrama
				case 'data-izin':
					include "admin/izin/data_izin.php";
					break;
				case 'add-izin':
					include "admin/izin/add_izin.php";
					break;
				case 'edit-izin':
					include "admin/izin/edit_izin.php";
					break;
				case 'del-izin':
					include "admin/izin/del_izin.php";
				case 'back-izin':
					include "admin/izin/kembali_izin.php";
					break;

				//Asrama
				case 'log-izin':
					include "admin/log/data_izin.php";
					break;

				//Asrama PTG
				case 'ptg-data-izin':
					include "petugas/izin/data_izin.php";
					break;
				case 'ptg-add-izin':
					include "petugas/izin/add_izin.php";
					break;
				case 'ptg-edit-izin':
					include "petugas/izin/edit_izin.php";
					break;
				case 'ptg-del-izin':
					include "petugas/izin/del_izin.php";
				case 'ptg-back-izin':
					include "petugas/izin/kembali_izin.php";
					break;

				//Asrama PTG
				case 'ptg-log-izin':
					include "petugas/log/data_izin.php";
					break;
					
					

          
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
              include "home/admin.php";
              }
          elseif($data_level=="Petugas"){
              include "home/petugas.php";
              }
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://pesantrenmq.sch.id">
					<strong> Divisi Multimedia MQ </strong>
				</a>
				All rights reserved.
			</div>
			<b>Pondok Pesantren Tahfidz Madinatul Qur'an</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<!-- Jquery Datetimepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>