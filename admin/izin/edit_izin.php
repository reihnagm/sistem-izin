<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_izin WHERE id_izin='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


			<input type='hidden' class="form-control" name="id_izin" value="<?php echo $data_cek['id_izin']; ?>"
			 readonly/>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Santri</label>
				<div class="col-sm-6">
					<select name="id_santri" id="id_santri" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_santri";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_santri'] ?>" <?=$data_cek[
						 'id_santri']==$row[ 'id_santri'] ? "selected" : null ?>>
							<?php echo $row['id_santri'] ?>
							|
							<?php echo $row['nama'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keperluan</label>
				<div class="col-sm-4">
					<select name="keperluan" id="keperluan" class="form-control">
						<option value="">- Pilih -</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['keperluan'] == "Pulang") echo "<option value='Pulang' selected>Pulang</option>";
                else echo "<option value='Pulang'>Pulang</option>";

                if ($data_cek['keperluan'] == "Keluar") echo "<option value='Keluar' selected>Keluar</option>";
                else echo "<option value='Keluar'>Keluar</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Keluar Pondok</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" 
					id="tgl_out" name="tgl_out" readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Masuk Pondok</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="tgl_in" name="tgl_in"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-izin" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_izin SET 
		id_santri='".$_POST['id_santri']."',
		keperluan='".$_POST['keperluan']."',
		keterangan='".$_POST['keterangan']."',
		tgl_out='".$_POST['tgl_out']."',
		tgl_in='".$_POST['tgl_in']."'
		WHERE id_izin='".$_POST['id_izin']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-izin';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-izin';
        }
      })</script>";
    }}


?>

<script src="././dist/lookup.js"></script>

<script>

	var tglout = '<?= $data_cek['tgl_out']; ?>'
	var tglin = '<?= $data_cek['tgl_in']; ?>'

	$(document).ready(function() {
		$("#tgl_out").datetimepicker({
			value: tglout
		});

		$("#tgl_in").datetimepicker({
			value: tglin
		});
		
		$('#id_santri').change(function() {
			var id_santri = $(this).val();
			$.ajax({
				url: "plugins/proses-ajax.php",
				method: "POST",
				data: {
					id_santri: id_santri
				},
				success: function(data) {
					$('#nama').val(data);
				}
			});
		});
		
	});
</script>