<?php
    require_once 'connexion.php'; 
    require_once 'ami.class.php';
    require_once 'utilisateurDAO.class.php';

class AmiDAO {
    private $bd;
    private $select;

    function __construct() {
        $this->bd = new Connexion();
        $this->select = 'SELECT id_uti, id_ami, status, date FROM ami';
    }

    function insert (Ami $ami) : void {
        $this->bd->execSQL("INSERT INTO ami (id_uti, id_ami, status, date)
                            VALUES (:idUti, :idAmi, :status, :date)"
                            ,[':idUti'=>$ami->getUti1()->getIdUti(), ':idAmi'=>$ami->getUti2()->getIdUti(), 
                            ':status'=>$ami->getStatus()->value, ':date'=>$ami->getDate()]);
    }    

    function deleteByIdUtiByIdAmi (int $idUti, int $idAmi) : void {
        $this->bd->execSQL("DELETE FROM ami 
                            WHERE id_uti = :idUti AND id_ami = :idAmi", 
                            [':idUti'=>$idUti, ':idAmi'=>$idAmi]);
    } 

    function deleteByIdUti (int $idUti) : void {
        $this->bd->execSQL("DELETE FROM ami 
                            WHERE id_uti = :idUti", 
                            [':idUti'=>$idUti]);
    } 

    function deleteByIdAmi (int $idAmi) : void {
        $this->bd->execSQL("DELETE FROM ami 
                            WHERE id_ami = :idAmi", 
                            [':idAmi'=>$idAmi]);
    } 

    function update (Ami $ami) : void {
        $this->bd->execSQL("UPDATE ami 
                            SET status = :status, date = :date
                            WHERE id_uti = :id AND id_ami = :idAmi"
                            ,[':idUti'=>$ami->getUti1()->getIdUti(), ':idAmi'=>$ami->getUti2()->getIdUti(), 
                            ':status'=>$ami->getStatus()->value, ':date'=>$ami->getDate()]);
    }    

    private function loadQuery (array $result) : array { 
        $amis = [];
        $utilisateurDAO = new UtilisateurDAO();
        foreach($result as $row) {
            $uti1 = $utilisateurDAO->getById($row['id_uti']);
            $uti2 = $utilisateurDAO->getById($row['id_ami']);
            $statusEnum = StatusAmis::from($row['status']); // Conversion

            $ami = new Ami(); 
            $ami->setUti1($uti1);
            $ami->setUti2($uti2);
            $ami->setStatus($statusEnum);
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
    
    function getByIdUti (int $idUti) : Array {
        $lesAmis = $this->loadQuery($this->bd->execSQLSelect($this->select ." WHERE
        id_uti = :idUti", [':idUti'=>$idUti]) );
        return $lesAmis;    
    }

    function existe (int $idUti, int $idAmi) : bool {
        $req = "SELECT * 
                FROM ami 
                WHERE id_uti = :idUti
                AND id_ami = :idAmi";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idUti'=>$idUti, ':idAmi'=>$idAmi])));
        return ($res != []); // si tableau d'amis est vide alors l'ami n’existe pas
    }

    function getDemandesEnAttente (int $idAmi) : array {
        $req = "SELECT * FROM ami WHERE id_ami = :idAmi AND status = 'en attente'";
        return $this->loadQuery($this->bd->execSQLSelect($req, [':idAmi'=>$idAmi]));
    }

    function getAmiAccepte (int $idUti) : array {
        $req = "SELECT pseudo, score_temps, score_morts, score.date
                FROM score, ami, utilisateur
                WHERE ami.id_ami = score.id_uti
                AND ami.id_ami = utilisateur.id_uti
                AND ami.id_uti = :idUti
                AND status = 'accepté'
                GROUP BY pseudo
                ORDER BY pseudo";
        return $this->bd->execSQLSelect($req, [':idUti'=>$idUti]);
    }
}    
?>