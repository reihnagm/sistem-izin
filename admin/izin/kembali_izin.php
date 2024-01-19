<?php
	$petugas = $_SESSION["ses_nama"];

	$sql = $koneksi->query("SELECT * from tb_telegram");
  	while ($data= $sql->fetch_assoc()) {
    $id_chat=$data['id_chat'];
  }
?>

<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT s.nama, s.alamat, i.id_izin FROM tb_santri s inner join tb_izin i on s.id_santri=i.id_santri WHERE id_izin='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$santri=$data_cek['nama'];
		$alamat=$data_cek['alamat'];
    }
	$sql_ubah = "UPDATE tb_izin SET status='0'
	WHERE id_izin='".$_GET['kode']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
	Swal.fire({title: 'Santri Telah Kembali',text: '',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {if (result.value)
		{window.location = 'index.php?page=data-izin';
		}
	})</script>";
	}else{
	echo "<script>
	Swal.fire({title: 'Proses Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {if (result.value)
		{window.location = 'index.php?page=data-izin';
		}
	})</script>";
	}