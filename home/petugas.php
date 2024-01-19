<?php
	$id= $_SESSION["ses_id"];

  $sql = $koneksi->query("SELECT COUNT(id_santri) as santri  from tb_santri");
  while ($data= $sql->fetch_assoc()) {
    $santri=$data['santri'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_izin) as izin  from tb_izin");
  while ($data= $sql->fetch_assoc()) {
    $izin=$data['izin'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_izin) as masa  from tb_izin where status='1' and aut_izin='$id'");
  while ($data= $sql->fetch_assoc()) {
    $masa=$data['masa'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_izin) as back  from tb_izin where status='0' and aut_izin='$id'");
  while ($data= $sql->fetch_assoc()) {
    $back=$data['back'];
  }
?>


<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $santri;  ?>
				</h3>

				<p>Jumlah Santri</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $izin;  ?>
				</h3>

				<p>Jumlah Izin</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="#" class="small-box-footer">Per Petugas
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $masa;  ?>
				</h3>

				<p>Santri Izin</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="index.php?page=ptg-data-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $back;  ?>
				</h3>

				<p>Telah Kembali</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=ptg-log-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>