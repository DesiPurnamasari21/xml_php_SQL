<?php
	session_start();
	if(isset($_POST['add'])){
		//Membuka file xml
		$sepatus = simplexml_load_file('files/sepatu.xml');
		$sepatu = $sepatus->addChild('sepatu');
		$sepatu->addChild('id', $_POST['id']);
		$sepatu->addChild('nama_sepatu', $_POST['nama_sepatu']);
		$sepatu->addChild('kategori', $_POST['kategori']);
		$sepatu->addChild('ukuran', $_POST['ukuran']);
		$sepatu->addChild('warna', $_POST['warna']);
		$sepatu->addChild('harga', $_POST['harga']);
		$sepatu->addChild('sisa_stok', $_POST['sisa_stok']);
		file_put_contents('files/sepatu.xml', $sepatus->asXML());
		$_SESSION['message'] = 'Data Sepatu Berhasil Ditambahkan';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}

?>