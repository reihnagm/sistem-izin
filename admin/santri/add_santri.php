<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Induk</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_santri" name="id_santri" placeholder="No Induk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Santri</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Santri" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-2">
					<select name="jekel" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>LK</option>
						<option>PR</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat santri" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wali Santri</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="wali" name="wali" placeholder="Nama Wali Santri" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP Wali</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="hp_wali" name="hp_wali" placeholder="No HP Wali" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Th Masuk</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="th_masuk" name="th_masuk" placeholder="Th Masuk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Asrama</label>
				<div class="col-sm-4">
					<select name="id_asrama" id="id_asrama" class="form-control select2bs4" required>
						<option selected="selected">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_asrama";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_asrama'] ?>">
							<?php echo $row['asrama'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-santri" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])) {

		//mulai proses simpan data
		$sql_simpan = "INSERT INTO tb_santri (id_santri, id_asrama, nama, jekel, alamat, wali, hp_wali, th_masuk, kelas) VALUES (
			'".$_POST['id_santri']."',
			'".$_POST['id_asrama']."',
			'".$_POST['nama']."',
			'".$_POST['jekel']."',
			'".$_POST['alamat']."',
			'".$_POST['wali']."',
			'".$_POST['hp_wali']."',
			'".$_POST['th_masuk']."',
			'".$_POST['kelas']."') 
			";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		if ($query_simpan) {
		echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-santri';
				}
			})</script>";
		} else{
		echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-santri';
				}
			})</script>";
    	}
		
	}
     //selesai proses simpan data
