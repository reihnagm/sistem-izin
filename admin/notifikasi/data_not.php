<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-bell"></i> Notifikasi</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama Personal / Grup</th>
						<th>ID Telegram</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$sql = $koneksi->query("select * from tb_telegram");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['telegram']; ?>
						</td>
						<td>
							<?php echo $data['id_chat']; ?>
						</td>
						<td>
							<a href="?page=edit-notifikasi&kode=<?php echo $data['id_telegram']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
						</td>
					</tr>
					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
		<a target="_blank" title="KLIK DISINI" href="https://youtu.be/YfIfVe6HEAA">
			Cara mendapatkankan ID Telegram.
		</a>
	</div>
	<!-- /.card-body -->