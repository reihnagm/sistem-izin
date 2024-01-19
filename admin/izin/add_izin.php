<?php
	$id = $_SESSION["ses_id"];
	$petugas = $_SESSION["ses_nama"];

	$sql = $koneksi->query("SELECT * from tb_telegram");
  	while ($data= $sql->fetch_assoc()) {
    $id_chat=$data['id_chat'];
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

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Santri</label>
				<div class="col-sm-5">
					<select name="id_santri" id="id_santri" class="form-control select2bs4" required>
						<option selected="selected">- Pilih -</option>
						<?php
							// ambil data dari database
							$query = "select * from tb_santri";
							$hasil = mysqli_query($koneksi, $query);
                        	while ($row = mysqli_fetch_array($hasil)) {
                        ?>
							<option value="<?php echo $row['id_santri'] ?>">
								<?php echo $row['id_santri']; ?>
								|
								<?php echo $row['nama'];  ?>
							</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama & Alamat</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keperluan</label>
				<div class="col-sm-2">
					<select name="keperluan" id="keperluan" class="form-control">
						<option>- Pilih -</option>
						<option>Pulang</option>
						<option>Keluar</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Keluar Pondok</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="tgl_out" name="tgl_out" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Kembali Pondok</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="tgl_in" name="tgl_in">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input id="simpan" type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-izin" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$santri=$_POST['nama'];
		$perlu=$_POST['keperluan'];
		$tglk=$_POST['tgl_out'];
		$out=date("d-m-Y", strtotime($tglk));
		$tglm=$_POST['tgl_in'];
		$in=date("d-m-Y", strtotime($tglm));

    	//mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_izin (id_santri, keperluan, keterangan, tgl_out, tgl_in, status, aut_izin) VALUES (
            '".$_POST['id_santri']."',
            '".$_POST['keperluan']."',
            '".$_POST['keterangan']."',
            '".$_POST['tgl_out']."',
            '".$_POST['tgl_in']."',
            '1',
            '".$id."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-izin';
			}
		})</script>";
		}else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-izin';
			}
		})</script>";
		}
	}
	//selesai proses simpan data
	 
?>

<script src="././dist/lookup.js"></script>

<script>

	// $("#simpan").on("click", function(e) {
	// 	e.preventDefault()

	// 	var idSantri = $("#id_santri").val()
	// 	var keperluan = $("#keperluan").val()
	// 	var keterangan = $("#keterangan").val()
	// 	var idSantri = $("#id_santri").val()
	// 	var tglOut = $("#tgl_out").val()
	// 	var tglIn = $("#tgl_in").val()

	// 	alert(tglIn)

	// 	$.ajax({
	// 		url: "",
	// 		method: "POST",
	// 		data: {
	// 			id_santri: idSantri,
	// 			keperluan: keperluan,
	// 			keterangan: keterangan,
	// 			tgl_out: tglOut,
	// 			tgl_in: tglIn,
	// 		},
	// 		success: function(data) {
	// 			Swal.fire({
	// 				title: 'Tambah Data Berhasil',
	// 				text: '',
	// 				icon: 'success',
	// 				confirmButtonText: 'OK',
	// 			}).then((result) => {
	// 				if (result.value) {
	// 					window.location = 'index.php?page=data-izin';
	// 				}
	// 			})
	// 		}
	// 	});
	// });

	$(document).ready(function() {
		$("#tgl_out").datetimepicker({
			value: new Date()
		});

		$("#tgl_in").datetimepicker({
			value: new Date()
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