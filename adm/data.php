<?php



if(isset($_POST['addInput'])){

    $nama = htmlspecialchars($_POST['Nama']);
    $jenis = htmlspecialchars($_POST['Jenis']);
    $harga = htmlspecialchars($_POST['Harga']);
    $keterangan = htmlspecialchars($_POST['Keterangan']);
    $stock = htmlspecialchars($_POST['Stock']);
    $gambar = basename($_FILES['Gambar']['name']);
    
    $data = [
    'nama' => $nama,
    'jenis' => $jenis ,
    'harga' => $harga ,
    'keterangan' => $keterangan ,
    'stock' => $stock ,
    'gambar' => $gambar
    ];

    $validasi = validasiBarang($data);

    if ($validasi === 0){
        $result = inputBarang($data, $koneksi);

        if($result)
        {
            $dir = $_SERVER['DOCUMENT_ROOT'].'/krakatau/upload/gambar';
            $upload = tambahGambar($dir, $_FILES['Gambar']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); 
            if($upload)header("Location:input_kra.php?succsess=1");
            

        } 
        else header ("Location:input_kra.php?errno=1");
        
    }
    else {
         ("Location:input_sepatu.php?error=missing_field&field=" . $validasi);
    }
    exit();
    
}

// proses ketika tombol delete di tekan 
else if(isset($_POST['del'])){
    $id = $_POST['id'];

    $result = hapusBarang($id, $koneksi);

    if($result) header("Location: tampil_data.php?success=2"); 
    else header("Location: tampil_data.php?errno=2"); 
}

if(isset($_POST['updateInput']))
{
    $nama = htmlspecialchars($_POST['Nama']);
    $jenis = htmlspecialchars($_POST['Jenis']);
    $harga = htmlspecialchars($_POST['Harga']);
    $keterangan = htmlspecialchars($_POST['Keterangan']);
    $stock = htmlspecialchars($_POST['Stock']);
    $id = $_POST['id'];

    // $data = [
    //                 'Nama' => $nama, 
    //                 'Jenis' => $jenis, 
    //                 'Harga' => $harga,
    //                 'Keterangan' => $keterangan
    // ];         
    // var_dump($data);

    $gambar = basename($_FILES['Gambar']['name']);

    // // variabel gambar yang lama ditabel barang
    $gblama = $_POST['gblama'];

    if(!empty($gambar)){
        $data = [
            'Nama' => $nama, 
            'Jenis' => $jenis, 
            'Harga' => $harga,
            'Keterangan' => $keterangan,
            'Stock' => $stock,
            'Gambar' => $gambar
        ];
    }
    else {
        $data = [
            'Nama' => $nama, 
            'Jenis' => $jenis, 
            'Harga' => $harga,
            'Keterangan' => $keterangan,
            'Stock' => $stock,
        ];
    }

    $validasi = validasiBarang($data);

    if($validasi === 0){
        $result = updateBarangGambar($data, $koneksi, $id);
        if($result) {
            if(!empty($gambar))
            {
                // $gb = satuBarang($koneksi, $id);
                $dest = $_SERVER['DOCUMENT_ROOT'].'/krakatau/upload/gambar/';
                $upload = tambahGambar($dest, $_FILES['Gambar']);
                if($upload) 
                { 
                    unlink("../upload/gambar/$gblama");
                    //  header("location: tampil_data.php");
                }
                else {
                     header("location: tampil_data.php?errno=2");
                }
            }
            else {
                //  header("location: tampil_data.php?success=1");
            }
        }
        else {
             header("location: tampil_data.php?errno=1");
        }
    }
    else 
        header("Location: tampil_data.php?id=$id&error=missing_field&field=" . $validasi); // line ini berisi pesan error jika ada salah satu inputan kosong dan inputan yang mana yang kosong
    
    exit();
}