<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Log Perizinan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Santri</th>
						<th>Asrama</th>
						<th>Keperluan</th>
						<th>Waktu</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>

					<?php
				$id= $_SESSION["ses_id"];
				$no = 1;
				$sql = $koneksi->query("SELECT s.id_santri, s.nama, s.hp_wali, a.asrama, i.id_izin, i.keperluan, i.keterangan, i.tgl_out, i.tgl_in
				from tb_santri s inner join tb_asrama a on s.id_asrama=a.id_asrama 
				inner join tb_izin i on s.id_santri=i.id_santri where status='0' and aut_izin=$id order by tgl_out desc");
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
							<?php echo $data['asrama']; ?>
						</td>
						<td>
							<?php echo $data['keperluan']; ?>
							-
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
							<?php  $tgl = $data['tgl_out']; echo date("d/M/Y", strtotime($tgl))?>
							<span class="badge badge-success">
								S/d
							</span>
							<?php  $tgl = $data['tgl_in']; echo date("d/M/Y", strtotime($tgl))?>
						</td>
						<td>
							<span class="badge badge-primary">
								Telah Kembali
							</span>
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