<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_santri WHERE id_santri='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Induk</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_santri" name="id_santri" value="<?php echo $data_cek['id_santri']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Santri</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
                else echo "<option value='LK'>LK</option>";

                if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
                else echo "<option value='PR'>PR</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wali Santri</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="wali" name="wali" value="<?php echo $data_cek['wali']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP Wali</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="hp_wali" name="hp_wali" value="<?php echo $data_cek['hp_wali']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $data_cek['kelas']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Th Masuk</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="th_masuk" name="th_masuk" value="<?php echo $data_cek['th_masuk']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Asrama</label>
				<div class="col-sm-4">
					<select name="id_asrama" id="id_asrama" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_asrama";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_asrama'] ?>" <?=$data_cek[
						 'id_asrama']==$row[ 'id_asrama'] ? "selected" : null ?>>
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
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-santri" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_santri SET 
		nama='".$_POST['nama']."',
		jekel='".$_POST['jekel']."',
		alamat='".$_POST['alamat']."',
		wali='".$_POST['wali']."',
		hp_wali='".$_POST['hp_wali']."',
		th_masuk='".$_POST['th_masuk']."',
		id_asrama='".$_POST['id_asrama']."',
		kelas='".$_POST['kelas']."'
		WHERE id_santri='".$_POST['id_santri']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-santri';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-santri';
        }
      })</script>";
    }}
