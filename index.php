<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Stok Sepatu</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Data Stok Toko Sepatu</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>ID</th>
                    <th>Nama Sepatu</th>
                    <th>Kategori</th>
                    <th>Ukuran</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Sisa Stok</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('files/sepatu.xml');
                    
                    foreach($file->sepatu as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->nama_sepatu; ?></td>
                            <td><?php echo $row->kategori; ?></td>
                            <td><?php echo $row->ukuran; ?></td>
                            <td><?php echo $row->warna; ?></td>
                            <td><?php echo $row->harga; ?></td>
                            <td><?php echo $row->sisa_stok; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </td>
                            <?php include('edit_delete_modal.php'); ?>
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>