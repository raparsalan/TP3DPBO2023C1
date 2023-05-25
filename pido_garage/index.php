<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Jenis.php');
include('classes/Merk.php');
include('classes/Mobil.php');
include('classes/Template.php');

// buat sebuah objek mobil
$listMobil = new Mobil($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listMobil->open();

// cari mobil
if (isset($_GET['btn-cari'])) {
    // methode mencari data mobil
    $listMobil->searchMobil($_GET['search']);
} else {
    // method menampilkan data mobil
    $listMobil->getMobilJoin();
}
if (isset($_GET['idFilter'])) {
    $id = $_GET['idFilter'];
    $listMobil->getMobilFilter($id);
}
if (isset($_GET['delete'])) {
    // methode mencari data mobil
    $id = $_GET['delete'];
    $delete = $listMobil->deleteData($id);
    if ($delete > 0) {
        // jika penghapusan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Hapus Data Gagal!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}

$data = null;

// ambil data mobil dan dimasukkan kedalam html untuk dipassing kedalam template
while ($row = $listMobil->getResult()) {
    $data .= '<div class="col">'.
        '<div class="card h-100 shadow-sm">
            <img src="assets/images/'.$row['foto'].'" class="card-img-top"height="230 px" alt="...">
                <div class="card-body"> <div class="clearfix mb-3"> 
                <span class="float-start" style="font-size:15px">'.$row['nama_mobil'].'</span> 
                <span class="float-end badge rounded-pill bg-primary" style="font-size:15px"> Rp.' .number_format($row['harga'],2,',','.'). '</span> 
            </div>
            <div class="text-center my-4"> 
                <a href="detail.php?id='.$row['id_mobil'].'" class="btn btn-success">Check Details</a> 
            </div> 
            <div class="text-center mt-1"> 
                <a href="editMobil.php?id='.$row['id_mobil'].'" class="btn btn-warning">Edit</a> 
                <a href="index.php?delete='.$row['id_mobil'].'" class="btn btn-danger" id="btn-delete">Delete</a> 
            </div>
            </div>
        </div> 
    </div>';
}
// tutup koneksi
$listMobil->close();
// buat sebuah objek mobil
$listMerk = new Merk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listMerk->open();
$filter = '<a class="dropdown-item" href="index.php">All</a>';
$listMerk->getMerk();

while ($row = $listMerk->getResult()) {
    $filter .='<a class="dropdown-item" href="index.php?idFilter='.$row['id_merk'].'">'.$row['merk'].'</a>';
}

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_MOBIL', $data);
$home->replace('DATA_FILTER', $filter);
$home->write();