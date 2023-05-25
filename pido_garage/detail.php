<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Jenis.php');
include('classes/Merk.php');
include('classes/Mobil.php');
include('classes/Template.php');

$id = $_GET['id'];
// buat sebuah objek mobil
$mobil = new Mobil($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$mobil->open();

// mengambil semua data mobil
$mobil->getMobilById($id);

$dataMobil = $mobil->getResult();
$data = null;
$data .= '<section>
<div class="row text-center mt-4">
  <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp">
    <div class="pricing_design">
      <div class="single-pricing">
        <div class="price-head">
          <img
            src="assets/images/'.$dataMobil['foto'].'"
            class="card-img-top"
            height="230 px"
            alt="..." />
          <h2>'.$dataMobil['nama_mobil'].'</h2>
          <h1> Rp. '.number_format($dataMobil['harga'],2,',','.').'</h1>
        </div>
        <ul>
          <li><b>Merk</b> '.$dataMobil['merk'].'</li>
          <li><b>Jenis</b> Rp. '.$dataMobil['nama_jenis'].'</li>
          <li><b>Tahun Pembuatan</b> '.$dataMobil['tahun'].'</li>
        </ul>
        <div class="text-center mt-1">
          <a
            href="editMobil.php?id='.$dataMobil['id_mobil'].'"
            class="btn btn-warning"
            >Edit</a
          >
          <a
            href="index.php?delete='.$dataMobil['id_mobil'].'"
            class="btn btn-danger"
            id="btn-delete"
            >Delete</a
          >
        </div>
        <div class="text-center mt-1">
          <a
            href="index.php"
            class="btn btn-secondary"
            >Back</a
          >
        </div>
      </div>
    </div>
  </div>
  <!--- END COL -->
</div>
</section>';
// ambil data mobil dan dimasukkan kedalam html untuk dipassing kedalam template


// tutup koneksi
$mobil->close();

// buat instance template
$home = new Template('templates/skinDetail.html');

// simpan data ke template
$home->replace('DATA_MOBIL', $data);
$home->write();