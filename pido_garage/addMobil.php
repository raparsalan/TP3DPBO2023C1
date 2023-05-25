<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Jenis.php');
include('classes/Merk.php');
include('classes/Mobil.php');
include('classes/Template.php');

// buat sebuah objek mobil
$mobil = new Mobil($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$mobil->open();

if (isset($_POST['btn-add'])) {
    $update = $mobil->addData($_POST, $_FILES);
    if ($update > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di Tambah');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Update Data Gagal!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
$data = null;
$data .= '<form action="#" method="POST" id="form-add" enctype="multipart/form-data">
<div class="form-group"> 
    <label for="username">
        <h6>Nama Mobil</h6>
    </label>
    <input type="hidden" name="id"> 
    <input type="text" name="nama_mobil" required class="form-control "> 
</div>
<div class="form-group"> 
    <label for="cardNumber">
        <h6>Merk Mobil</h6>
    </label>
    <div class="input-group">
    <select class="form-select" name="merk_mobil" required>';

$merk = new Merk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);


$merk->open();
$merk->getmerk();

while ($dataMerk = $merk->getResult()) {
    $data .= '<option value="'.$dataMerk['id_merk'].'">'.$dataMerk['merk'].'</option>';
};

$data .= '</select>       
        </div>
        </div>
        <div class="form-group"> 
            <label for="cardNumber">
                <h6>Jenis Mobil</h6>
            </label>
            <div class="input-group">
                <select class="form-select" name="jenis_mobil" required>';

$jenis = new Jenis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

$jenis->open();

$jenis->getJenis();

while ($dataJenis = $jenis->getResult()) {
    $data .= '<option value="'.$dataJenis['id_jenis'].'">'.$dataJenis['nama_jenis'].'</option>';
};

$data .= '</select>       
            </div>
            </div>
            <div class="form-group"> 
            <label for="tahun_produksi">
                <h6>Tahun Produksi</h6>
            </label>
            <div class="input-group"> 
                <input type="number" name="tahun" class="form-control" required>    
            </div>
            </div>
            <div class="form-group"> 
            <label for="harga">
                <h6>Harga</h6>
            </label>
            <div class="input-group"> 
                <input type="number" name="harga" class="form-control " required>    
            </div>
            </div>
            <div class="form-group"> 
            <label for="foto_mobil">
                <h6>Foto Mobil</h6>
            </label>
            <div class="input-group">
                <input type="file" name="foto_mobil">    
            </div>
            </div>
            </div>
            <div class="card-footer mt-2"> 
                <button type="submit" name="btn-add" class="subscribe btn btn-primary btn-block shadow-sm"> Tambah Data
                </button>
            </div>
            </form>';

// ambil data mobil dan dimasukkan kedalam html untuk dipassing kedalam template


// tutup koneksi
$mobil->close();

// buat instance template
$home = new Template('templates/skinAddEdit.html');

// simpan data ke template
$home->replace('PROSES_DATA', 'Tambah Data');
$home->replace('FORM_DATA', $data);
$home->write();