<?php

class Mobil extends DB
{
    function getMobilJoin()
    {
        $query = "SELECT * FROM mobil JOIN jenis ON mobil.id_jenis=jenis.id_jenis JOIN merk ON mobil.id_merk=merk.id_merk ORDER BY mobil.id_mobil";

        return $this->execute($query);
    }

    function getMobilFilter($id)
    {   
        $idMerk = $id;
        $query = "SELECT * FROM mobil JOIN jenis ON mobil.id_jenis=jenis.id_jenis JOIN merk ON mobil.id_merk=merk.id_merk WHERE merk.id_merk = $idMerk";

        return $this->execute($query);
    }

    function getMobil()
    {
        $query = "SELECT * FROM mobil";
        return $this->execute($query);
    }

    function getMobilById($id)
    {
        $query = "SELECT * FROM mobil JOIN jenis ON mobil.id_jenis=jenis.id_jenis JOIN merk ON mobil.id_merk=merk.id_merk WHERE mobil.id_mobil = $id";
        return $this->execute($query);
    }

    function searchMobil($keyword)
    {        
        $query = "SELECT * FROM mobil JOIN jenis ON mobil.id_jenis=jenis.id_jenis JOIN merk ON mobil.id_merk=merk.id_merk WHERE nama_mobil LIKE '%$keyword%' OR MERK LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addData($data, $file)
    {
        $id = $data['id'];
        $nama = $data['nama_mobil'];
        $id_merk = $data['merk_mobil'];
        $id_jenis = $data['jenis_mobil'];
        $harga = $data['harga'];
        $tahun = $data['tahun'];
        $nama_foto = $file['foto_mobil']['name'];
        if ($nama_foto != null) {
            $tempNamaFoto = $file['foto_mobil']['tmp_name'];
            $direktori = 'assets/images/' . $nama_foto;
            move_uploaded_file($tempNamaFoto, $direktori);
            $query = "INSERT INTO mobil VALUES('', $id_jenis, $id_merk, '$nama_foto', '$nama', '$tahun', '$harga')";
        }else {
            $query = "INSERT INTO mobil VALUES('', $id_jenis, $id_merk, 'dummy.jpeg', '$nama', '$tahun', '$harga')";
        }

        return $this->executeAffected($query);

    }

    function updateData($data, $file)
    {
        $id = $data['id'];
        $nama = $data['nama_mobil'];
        $id_merk = $data['merk_mobil'];
        $id_jenis = $data['jenis_mobil'];
        $harga = $data['harga'];
        $tahun = $data['tahun'];
        $nama_foto = $file['foto_mobil']['name'];
        if ($nama_foto != null) {
            $tempNamaFoto = $file['foto_mobil']['tmp_name'];
            $direktori = 'assets/images/' . $nama_foto;
            move_uploaded_file($tempNamaFoto, $direktori);
            $query = "UPDATE mobil SET nama_mobil = '$nama', id_jenis = $id_jenis, id_merk = $id_merk, harga = '$harga', tahun = '$tahun', foto_mobil = '$nama_foto' WHERE mobil.id_mobil = $id";
        }else {
            $query = "UPDATE mobil SET nama_mobil = '$nama', id_jenis = $id_jenis, id_merk = $id_merk, harga = '$harga', tahun = '$tahun' WHERE mobil.id_mobil = $id";
        }

        return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        $idDel = $id;
        $query = "DELETE FROM mobil WHERE mobil.id_mobil = $idDel";
        
        return $this->executeAffected($query);
    }
}
