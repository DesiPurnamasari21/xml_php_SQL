<?php
	session_start();
	$id = $_GET['id'];

	$sepatus = simplexml_load_file('files/sepatu.xml');

	$index = 0;
	$i = 0;

	foreach($sepatus->sepatu as $sepatu){
		if($sepatu->id == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($sepatus->sepatu[$index]);
	file_put_contents('files/members.xml', $sepatus->asXML());

	$_SESSION['message'] = 'Data Sepatu Berhasil Dihapus';
	header('location: index.php');

?>