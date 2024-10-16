<?php

require_once "../config/config.php";

$tampil = satuBarang($koneksi, $_GET["id"]) 

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="../image/Kra-removebg-preview1.png">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    
  <title>Document</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                    //foreach($tampil as $rec){
                    ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Menu" name="Nama" value="<?= $tampil['Nama']?>">
                </div>

                <label for="exampleFormControlInput1" class="form-label">Jenis</label>
                <select class="form-select" aria-label="Default select example" name="Jenis">
                    <option value="">-- Jenis Makanan --</option>

                    <?php 
                    $kategori = tampilKategori($koneksi);

                    foreach ($kategori as $kat) {

                    ?>
                        <option value="<?= $kat['id'] ?>" <?php if($kat['id'] == $tampil['Jenis']) { echo 'selected'; } ?> ><?= $kat['nama'] ?></option>
                    <?php } ?>
                        
                </select>


                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp. 0.0" name="Harga" value="<?= $tampil['Harga']?>">


                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Keterangan"><?= $tampil['Keterangan']?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp. 0.0" name="Stock" value="<?= $tampil['Stock']?>">
                </div>

                <img class ="ayam" style="width:7rem !important " src="../upload/gambar/<?= $tampil['Gambar'] ?>" alt="">
                <!-- Image Forms Starts -->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Gambar</label>
                    <input class="form-control" type="file" id="" name="Gambar">
                </div>
                <!-- Image Forms Ends -->
                <input type="hidden" name="id" value="<?= $tampil['id']?>">
                <input type="hidden" name="gblama" value="<?= $tampil['Gambar'] ?>">
                <button type="submit" class="btn btn-primary" name="updateInput">Update Data</button>


                </form>
                <?php
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>