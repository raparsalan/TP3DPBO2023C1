<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Divisi.php');
include('classes/Jabatan.php');
include('classes/Pengurus.php');
include('classes/Template.php');

// buat instance pengurus
$listPengurus = new Pengurus($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listPengurus->open();
// tampilkan data pengurus
$listPengurus->getPengurusJoin();

// cari pengurus
if (isset($_POST['btn-cari'])) {
    // methode mencari data pengurus
    $listPengurus->searchPengurus($_POST['cari']);
} else {
    // method menampilkan data pengurus
    $listPengurus->getPengurusJoin();
}

$data = null;

// ambil data pengurus
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listPengurus->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 pengurus-thumbnail">
        <a href="detail.php?id=' . $row['pengurus_id'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['pengurus_foto'] . '" class="card-img-top" alt="' . $row['pengurus_foto'] . '">
            </div>
            <div class="card-body">
                <p class="card-text pengurus-nama my-0">' . $row['pengurus_nama'] . '</p>
                <p class="card-text divisi-nama">' . $row['divisi_nama'] . '</p>
                <p class="card-text jabatan-nama my-0">' . $row['jabatan_nama'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listPengurus->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_PENGURUS', $data);
$home->write();


create table mobil(
id_mobil int(11) NOT NULL AUTO_INCREMENT,
id_jenis int(11),
id_merk int(11),
nama_mobil varchar(255) NOT NULL,
tahun varchar(255),
harga varchar(255),
PRIMARY KEY (id_mobil),
FOREIGN KEY (id_jenis) REFERENCES jenis(id_jenis) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (id_merk) REFERENCES merk(id_merk)ON DELETE SET NULL ON UPDATE CASCADE);