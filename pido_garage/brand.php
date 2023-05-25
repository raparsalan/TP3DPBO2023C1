<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Jenis.php');
include('classes/Merk.php');
include('classes/Mobil.php');
include('classes/Template.php');

// buat sebuah objek merk
$listMerk = new Merk($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listMerk->open();

$modif = null;


if (isset($_GET['delete'])) {
    // methode mencari data mobil
    $id = $_GET['delete'];
    $delete = $listMerk->deleteMerk($id);
    if ($delete > 0) {
        // jika penghapusan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'brand.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Hapus Data Gagal!');
        document.location.href = 'brand.php';
        </script>
        ";
    }
}else if (isset($_POST['btn-add'])) {
    $add = $listMerk->addMerk($_POST);
    if ($add > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di Tambah');
            document.location.href = 'brand.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Tambah Data Gagal!');
        document.location.href = 'brand.php';
        </script>
        ";
    }
}else if (isset($_POST['btn-update'])) {
    $idJenis = $_GET['id'];
    $update = $listMerk->updateMerk($idJenis, $_POST);
    if ($update > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di Ubah');
            document.location.href = 'brand.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Update Data Gagal!');
        document.location.href = 'brand.php';
        </script>
        ";
    }
}

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $listMerk->getMerkById($id);
    $merk = $listMerk->getResult();
    $modif .= '
    <div class="container mt-4" style="width: 750px">
    <center>
        <h2>Edit Data</h2>
    <center>
    <form action="" method="POST" id="form-edit" enctype="multipart/form-data">
      <div class="input-group">
        <input type="hidden" name="id" values="'.$id.'">
        <input type="text" name="merk" class="form-control" size="10px" value="'.$merk['merk'].'">
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary" name="btn-update">
            Edit
          </button>
        </div>
      </div>
    </form>
  </div>';
}else{
    $modif .= '
    <div class="container mt-4" style="width: 750px">
    <center>
        <h2>Tambah Data</h2>
    <center>
    <form action="#" method="POST">
      <div class="input-group">
        <input type="text" name="merk" class="form-control" size="10px" />
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary" name="btn-add">
            Tambah Data
          </button>
        </div>
      </div>
    </form>
  </div>';
}

$header = '
<tr>
    <th scope="row">No.</th>
    <th scope="row">Jenis Mobil</th>
    <th scope="row">Aksi</th>
</tr>';
$data = null;
$no =1;

$listMerk->getMerk();
while ($row = $listMerk->getresult()) {
    $data.='<tr>
    <th scope="row">'.$no.'</th>
    <td>'.$row['merk'].'</td>
    <td>
        <a href="brand.php?id='.$row['id_merk'].'" class="btn btn-warning">Edit</a> 
        <a href="brand.php?delete='.$row['id_merk'].'" class="btn btn-danger" id="btn-delete">Delete</a> 
    </td>';
    $no++;
}

// tutup koneksi
$listMerk->close();

// buat instance template
$home = new Template('templates/skinTabel.html');

// simpan data ke template
$home->replace('DATA_MAIN_TITLE', "Tipe Mobil");
$home->replace('DATA_MODIF', $modif);
$home->replace('DATA_TABEL_HEADER', $header);
$home->replace('DATA_TABEL', $data);
$home->write();