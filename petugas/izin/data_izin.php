<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Perizinan Santri</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=ptg-add-izin" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Santri</th>
						<th>Alamat</th>
						<th>Hp Wali</th>
						<th>Asrama</th>
						<th>Keperluan</th>
						<th>Waktu</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
				$id= $_SESSION["ses_id"];
				$no = 1;
				$sql = $koneksi->query("SELECT s.id_santri, s.nama, s.alamat, s.hp_wali, a.asrama, i.id_izin, i.keperluan, i.keterangan, i.tgl_out, i.tgl_in
				from tb_santri s inner join tb_asrama a on s.id_asrama=a.id_asrama 
				inner join tb_izin i on s.id_santri=i.id_santri where status='1' and aut_izin=$id");
				while ($data= $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_santri']; ?>-
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php echo $data['hp_wali']; ?>
						</td>
						<td>
							<?php echo $data['asrama']; ?>
						</td>
						<td>
							<?php echo $data['keperluan']; ?>
							-
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
							<?php  $tgl = $data['tgl_out']; echo date("d/M/Y", strtotime($tgl))?>
							<span class="badge badge-warning">
								S/d
							</span>
							<?php  $tgl = $data['tgl_in']; echo date("d/M/Y", strtotime($tgl))?>
						</td>
						<?php

							$tgl1 = date("Y-m-d");
							$tgl2 = $data['tgl_in'];

							$pecah1 = explode("-", $tgl1);
							$date1 = $pecah1[2];
							$month1 = $pecah1[1];
							$year1 = $pecah1[0];

							$pecah2 = explode("-", $tgl2);
							$date2 = $pecah2[2];
							$month2 = $pecah2[1];
							$year2 =  $pecah2[0];

							$jd1 = GregorianToJD($month1, $date1, $year1);
							$jd2 = GregorianToJD($month2, $date2, $year2);

							$selisih = $jd1 - $jd2;
							?>

						<td>
							<?php if ($selisih <= 0) { ?>
							<span class="badge badge-success">
								Masa Izin
							</span>
							<?php } elseif ($selisih > 0) { ?>
							<span class="badge badge-danger">
								Terlambat
							</span>
						</td>
						<?php } ?>

						<td>
							<a href="?page=ptg-edit-izin&kode=<?php echo $data['id_izin']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=ptg-back-izin&kode=<?php echo $data['id_izin']; ?>" onclick="return confirm('Benarkah Santri Sudah Kembali ?')"
							 title="Santri Kembali" class="btn btn-info btn-sm">
								<i class="fa fa-check"></i>
								 <th><a href="cetak.php" target="_blank">PRINT</a><th>
								
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->