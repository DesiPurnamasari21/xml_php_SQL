<?php
	session_start();
	if(isset($_POST['edit'])){
		$sepatus = simplexml_load_file('files/sepatu.xml');
		foreach($sepatus->sepatu as $sepatu){
			if($sepatu->id == $_POST['id']){
				$sepatu->nama_sepatu = $_POST['nama_sepatu'];
				$sepatu->kategori = $_POST['kategori'];
				$sepatu->ukuran = $_POST['ukuran'];
				$sepatu->warna = $_POST['warna'];
				$sepatu->harga = $_POST['harga'];
				$sepatu->sisa_stok = $_POST['sisa_stok'];
				break;
			}
		}

		file_put_contents('files/sepatu.xml', $sepatus->asXML());
		$_SESSION['message'] = 'Data Sepatu Berhasil Diubah';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Pilih Data yang akan Diubah';
		header('location: index.php');
	}

?>