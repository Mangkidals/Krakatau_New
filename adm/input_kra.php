<?php

include "../config/config.php";
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
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Menu" name="Nama">
                </div>

                <label for="exampleFormControlInput1" class="form-label">Jenis</label>
                <select class="form-select" aria-label="Default select example" name="Jenis">
                    <option value="">-- Jenis Makanan --</option>
                    <option value="1">Makanan Berat</option>
                    <option value="2">Makanan Ringan</option>
                    <option value="3">Minuman</option>
                </select>


                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp. 0.0" name="Harga">


                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Keterangan"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp. 0.0" name="Stock">
                </div>

                <!-- Image Forms Starts -->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Gambar</label>
                    <input class="form-control" type="file" id="" name="Gambar">
                </div>
                <!-- Image Forms Ends -->

                <button type="submit" class="btn btn-primary" name="addInput">Inputkkan Data</button>




                </form>
            </div>
        </div>
    </div>

</body>