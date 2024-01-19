<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Perizinan Santri</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-izin" class="btn btn-primary">
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
						<th>Petugas</th>
						<th>Aksi</th>
						<th>Print</th>
					</tr>
				</thead>
				<tbody>

					<?php
						$no = 1;
						$sql = $koneksi->query("SELECT s.id_santri, s.nama, s.wali, s.kelas, s.wali, s.hp_wali, s.alamat, a.asrama, i.id_izin, i.keperluan, i.keterangan, i.tgl_out, i.tgl_in, i.aut_izin
						from tb_santri s inner join tb_asrama a on s.id_asrama=a.id_asrama 
						inner join tb_izin i on s.id_santri = i.id_santri where status='1'");
						while ($data= $sql->fetch_assoc()) {
							$ptg = $data['aut_izin'];
					?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_santri']; ?>
							-
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
							$tgl2 = $data['tgl_in'];

							date_default_timezone_set('Asia/Jakarta');

							$currentDateTime = new DateTime();

							$specificDateTime = new DateTime($tgl2);

							$timeDifference = $currentDateTime->diff($specificDateTime);

							$timeDifference->format('%Y years, %m months, %d days, %h hours, %i minutes, %s seconds');
						?>
						<td>
							<?php if ($timeDifference->invert == 0) { ?>
							<span class="badge badge-success">
								Masa Izin
							</span>
							<?php } else { ?>
							<span class="badge badge-danger">
								Terlambat
							</span>
						</td>
						<?php } 
						?>
						<td>
							<?php
								$sql_ptg = "SELECT * from tb_pengguna where id_pengguna='$ptg'";
								$q_ptg = mysqli_query($koneksi, $sql_ptg);
								while($row = mysqli_fetch_array($q_ptg)) {
									$petugas=$row['nama_pengguna'];
								}
								echo $petugas;
							?>
						</td>
						<td>
							<a href="?page=edit-izin&kode=<?php echo $data['id_izin']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=back-izin&kode=<?php echo $data['id_izin']; ?>" onclick="return confirm('Benarkah Santri Sudah Kembali ?')"
							 	title="Santri Kembali" class="btn btn-info btn-sm">
								<i class="fa fa-check"></i>
							</>
						</td>
						<td>
							<a href="cetak.php?name=<?= $data['nama'] ?>&need=<?= $data['keperluan'] ?>&tgl_in=<?= $data['tgl_in'] ?>&tgl_out=<?= $data['tgl_out'] ?>&class=<?= $data['kelas'] ?>&parent=<?= $data['wali'] ?>&keterangan=<?= $data['keterangan'] ?>" target="_blank">PRINT</a>
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
	
