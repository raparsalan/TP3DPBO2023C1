<?php

class Jenis extends DB
{
    function getJenis()
    {
        $query = "SELECT * FROM jenis";
        return $this->execute($query);
    }

    function getJenisById($id)
    {
        $query = "SELECT * FROM jenis WHERE id_jenis=$id";
        return $this->execute($query);
    }

    function addJenis($data)
    { 
        $jenis = $data['jenis'];
        $query = "INSERT INTO jenis VALUES('', '$jenis')";
        return $this->executeAffected($query);
    }

    function updateJenis($id, $data)
    {
        $idJenis = $id;
        $jenis = $data['jenis'];
        $sql = "UPDATE jenis SET nama_jenis = '$jenis' WHERE jenis.id_jenis = $idJenis ";
        return $this->executeAffected($sql);
    }

    function deleteJenis($id)
    {
        $id = $id;
        $query = "DELETE FROM jenis WHERE id_jenis = $id";
        return $this->executeAffected($query);
    }
}
