<?php

Header('Content-type: text/xml');
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "db_xml") or die("Error " . mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');
//menampilkan data dari database, table sepatu
$sql = "select * from sepatu ";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//membuat array
while ($row = mysqli_fetch_assoc($result)) {

    $track = $xml->addChild('sepatu');
    $track->addChild('nama_sepatu', $row['nama_sepatu']);
    $track->addChild('kategori', $row['kategori']);
    $track->addChild('ukuran', $row['ukuran']);
    $track->addChild('warna', $row['warna']);
    $track->addChild('sisa_stok', $row['sisa_stok']);
}

print($xml->asXML());
//tutup koneksi ke database
mysqli_close($connection);
?>