<?php

function validasiBarang ($data){

    foreach ($data as $barang => $value){

        $value = trim($value);
        if ($value === '' || $value === null || $value === false)
        return $barang;
    }
    return 0;
}


// input data ke tabel

function inputBarang ($data, $koneksi){
    
    $nama = $data['nama'];
    $jenis = $data['jenis'];
    $harga = $data['harga'];
    $keterangan = $data['keterangan'];
    $stock = $data['stock'];
    $gambar = $data['gambar'];


    $sql = "INSERT INTO makanan (nama, jenis, harga, keterangan, stock, gambar) VALUES (?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt === false){
        return "Failed to prepare statement".mysqli_error($koneksi);
    }
    mysqli_stmt_bind_param($stmt, 'ssisis', $nama, $jenis, $harga, $keterangan, $stock, $gambar);
    $result = mysqli_stmt_execute($stmt);


    if (!$result){
        echo "Error executing statement : ". mysqli_stmt_error($stmt);
        return false;
    }


    mysqli_stmt_close($stmt);
    return true;

}

function tampilBarang($koneksi){
    $sql  = "SELECT * FROM makanan"; // query untuk menampilkan semua data 
    $stmt = mysqli_query($koneksi, $sql);

    // $result = mysqli_fetch_array($stmt);

    if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}
// baru ditambahkan, 
// fungsi untuk menghapus data yang terpilih
function hapusBarang($id, $koneksi){
    $sql = "DELETE FROM makanan WHERE id = ? ";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt === false) {
        return "Failed to prepare statement: " . mysqli_error($koneksi);
    }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
    return true;
}

function satuBarang($koneksi, $id)
{
    $sql = "SELECT * FROM makanan WHERE id = $id";
    $stmt = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($stmt) > 0 ) return mysqli_fetch_array($stmt);
    else return false; 
}

function tampilKategori($koneksi)
{
    $sql = "SELECT * FROM kategori";
    $stmt = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($stmt) > 0 ) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false; 
}

// Update User


function updateBarang($koneksi,$data,$id){

    foreach ($data as $rec => $value)
    {
        $sql = "UPDATE makanan SET $rec = ? WHERE id = ?";
        // echo "UPDATE makanan SET '$rec' = $value WHERE id = $id";
        $stmt = mysqli_prepare($koneksi,$sql);
        if ($stmt === false)
            return "Failed to prepare statement : ". mysqli_error($koneksi);
        mysqli_stmt_bind_param($stmt,'si',$value,$id);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }
    
    return true;
}
// baru ditambahkan 
// fungsi untuk menampilkan satu data sesuai id yang dipilih    

function updateBarangGambar($data,$koneksi,$id)
{
    foreach ($data as $rec => $value)
    {
        $sql = "UPDATE makanan SET $rec = ? WHERE id = ?";
        $stmt = mysqli_prepare($koneksi,$sql);
        if ($stmt === false)
            return "Failed to prepare statement : " .mysqli_error($koneksi);
        mysqli_stmt_bind_param($stmt, 'si', $value, $id);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

    }
    return true;
}