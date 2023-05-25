<?php

class Merk extends DB
{
    function getMerk()
    {
        $query = "SELECT * FROM merk";
        return $this->execute($query);
    }

    function getMerkById($id)
    {
        $query = "SELECT * FROM merk WHERE id_merk=$id";
        return $this->execute($query);
    }

    function addMerk($data)
    {
        $merk = $data['merk'];
        $query = "INSERT INTO merk VALUES('', '$merk')";
        return $this->executeAffected($query);
    }

    function updateMerk($id, $data)
    {
        $idJenis = $id;
        $jenis = $data['merk'];
        $sql = "UPDATE merk SET merk = '$jenis' WHERE merk.id_merk = $idJenis ";
        return $this->executeAffected($sql);
    }

    function deleteMerk($id)
    {
        $id = $id;
        $query = "DELETE FROM merk WHERE id_merk = $id";
        return $this->executeAffected($query);
    }
}
