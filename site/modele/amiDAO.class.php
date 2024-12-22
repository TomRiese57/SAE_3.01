<?php
require_once "connexion.php";
require_once ".ami.class.php";
class AmiDAO
{
    // définition des propriétés
    private $bd;
    private $select;
    // définition des méthodes
    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = "SELECT * FROM ami";
    }

    function insert(Ami $ami): void
    {
        $this->bd->execSQL("INSERT INTO ami (id_uti, id_ami, 'status', 'date')
        VALUES (:idUti, :idAmi, :'status', :'date')",
            [':idUti' => $ami->getIdUti(), ':idAmi' => $ami->getIdAmi(), ':status' => $ami->getStatus(), ":date" => $ami->getDate()]
        );
    }

    function deleteByIdUtiByIdAmi(int $idUti, int $idAmi): void
    {
        $this->bd->execSQL("DELETE FROM ami WHERE id_uti = :idUti AND id_ami = :IdAmi;", [$idUti, $idAmi]);
    }

    function update(Ami $ami)
    {
        $this->bd->execSQL(
            "UPDATE ami SET 'status' = :'status', 'date' = :'date' WHERE idUti = :idUti AND id_ami = :IdAmi;",
            [":status" => $ami->getStatus(), ":date" => $ami->getDate(), ":IdUti" => $ami->getIdUti(), ":IdAmi" => $ami->getIdAmi()]
        );
    }

    private function loadQuery(array $result): array
    {
        $amis = [];
        foreach ($result as $row) {
            $ami = new Ami();
            $ami->setIdUti($row['id_uti']);
            $ami->setIdAmi($row['id_ami']);
            $ami->setStatus($row['status']);
            $ami->setDate($row['date']);
            $amis[] = $ami;
        }
        return $amis;
    }

    function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQLSelect($this->select));
    }

    function getByIdUtiByIdAmi(int $IdUti, int $idAmi): array
    {

        return $this->loadQuery($this->bd->execSQLSelect($this->select . " WHERE id_uti = :idUti AND id_ami = idAmi", [':idUti' => $IdUti, ':idAmi' => $idAmi]));
    }

    function existe(string $IdUti, string $idAmi): bool
    {
        $req = "SELECT * FROM ami WHERE id_uti = :idUti AND id_ami = :idAmi";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idUti' => $IdUti, ":idAmi" => $idAmi])));
        return ($res != []);
    }
}
?>