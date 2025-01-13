<?php
    require_once 'connexion.php'; 
    require_once 'ami.class.php';

class AmiDAO {
    private $bd;
    private $select;

    function __construct(){
        $this->bd = new Connexion();
        $this->select = 'SELECT id_uti, id_ami, status, date FROM ami';
    }

    function insert (Ami $ami) : void {
        $this->bd->execSQL("INSERT INTO ami (id_uti, id_ami, status, date)
                            VALUES (:idUti, :idAmi, :status, :date)"
                            ,[':idUti'=>$ami->getIdUti(), ':idAmi'=>$ami->getIdAmi(), 
                            ':status'=>$ami->getStatus(), ':date'=>$ami->getDate()]);
    }    

    function deleteByIdUtiByIdAmi (int $idUti, int $idAmi) : void {
        $this->bd->execSQL("DELETE FROM ami 
                            WHERE id_uti = :idUti AND id_ami = :idAmi", 
                            [':idUti'=>$idUti, ':idAmi'=>$idAmi]);
    } 

    function update (Ami $ami) : void {
        $this->bd->execSQL("UPDATE ami 
                            SET status = :status, date = :date
                            WHERE id_uti = :id AND id_ami = :idAmi"
                            ,[':idUti'=>$ami->getIdUti(), ':idAmi'=>$ami->getIdAmi(), 
                            ':status'=>$ami->getStatus(), ':date'=>$ami->getDate()]);
    }    

    private function loadQuery (array $result) : array { 
        $amis = [];
        foreach($result as $row) {
            $ami = new Ami(); 
            $ami->setIdUti($row['id_uti']);
            $ami->setIdAmi($row['id_ami']);
            $ami->setStatus($row['status']);
            $ami->setDate($row['date']);
            $amis[] = $ami;
        }
        return $amis;
    }

    function getAll () : array {
        return ($this->loadQuery($this->bd->execSQLSelect($this->select)));
    }

    function getByIdUtiByIdAmi (int $idUti, int $idAmi) : Ami {
        $unAmi = new Ami();
        $lesAmis = $this->loadQuery($this->bd->execSQLSelect($this->select ." WHERE
        id_uti = :idUti AND id_ami = :idAmi", [':idUti'=>$idUti, ':idAmi'=>$idAmi]) );
        if (count($lesAmis) > 0) { 
            $unAmi = $lesAmis[0]; 
        }
        return $unAmi;
        // il y a un seul élément dans le tableau d'amis ➔ indice 0 return $unAmi;
    }	

    function existe (int $idUti, int $idAmi) : bool {
        $req = "SELECT * 
                FROM ami 
                WHERE id_uti = :idUti
                AND id_ami = :idAmi";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idUti'=>$idUti, ':idAmi'=>$idAmi])));
        return ($res != []); // si tableau d'amis est vide alors l'ami n’existe pas
    }
}    
?>