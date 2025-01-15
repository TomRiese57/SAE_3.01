<?php
require_once 'connexion.php'; 
require_once 'utilisateur.class.php';

class UtilisateurDAO {
    private $bd;
    private $select;

    function __construct(){
        $this->bd = new Connexion();
        $this->select = 'SELECT id_uti, pseudo, email, mot_de_passe, score_temps, score_morts, date FROM `utilisateur`';
    }

    function insert (Utilisateur $utilisateur) : void {
        $this->bd->execSQL("INSERT INTO utilisateur (id_uti, pseudo, email, mot_de_passe, 
                            score_temps, score_morts, date)
                            VALUES (:idUti, :pseudo, :email, :motDePasse, :scoreTemps, :scoreMorts, :date)"
                            ,[':idUti'=>$utilisateur->getIdUti() ,':pseudo'=>$utilisateur->getPseudo(), 
                            ':email'=>$utilisateur->getEmail(), ':motDePasse'=>$utilisateur->getMotDePasse(), 
                            ':scoreTemps'=>$utilisateur->getScoreTemps(), ':scoreMorts'=>$utilisateur->getScoreMorts(), 
                            ':date'=>$utilisateur->getDate()]);
    }    

    function delete (int $idUti) : void {
        $this->bd->execSQL("DELETE FROM utilisateur 
                            WHERE id_uti = :idUti", [':idUti'=>$idUti]);
    } 

    function update (Utilisateur $utilisateur) : void {
        $this->bd->execSQL("UPDATE utilisateur 
                            SET pseudo = :pseudo, email = :email, mot_de_passe = :motDePasse, 
                            score_temps = :scoreTemps, score_morts = :scoreMorts, date = :date
                            WHERE id_uti = :id"
                            ,[':idUti'=>$utilisateur->getIdUti() ,':pseudo'=>$utilisateur->getPseudo(), 
                            ':email'=>$utilisateur->getEmail(), ':motDePasse'=>$utilisateur->getMotDePasse(), 
                            ':scoreTemps'=>$utilisateur->getScoreTemps(), ':scoreMorts'=>$utilisateur->getScoreMorts(), 
                            ':date'=>$utilisateur->getDate()]);
    }    

    private function loadQuery (array $result) : array { 
        $utilisateurs = [];
        foreach($result as $row) {
            $utilisateur = new Utilisateur(); 
            $utilisateur->setIdUti($row['id_uti']);
            $utilisateur->setPseudo($row['pseudo']);
            $utilisateur->setEmail($row['email']);
            $utilisateur->setMotDePasse($row['mot_de_passe']);
            $utilisateur->setScoreTemps($row['score_temps']);
            $utilisateur->setScoreMorts($row['score_morts']);
            $utilisateur->setDate($row['date']);
            $utilisateurs[] = $utilisateur;
        }
        return $utilisateurs;
    }

    function getAll () : array {
        return ($this->loadQuery($this->bd->execSQLSelect($this->select)));
    }

    function getById (int $idUti) : Utilisateur {
        $unUtilisateur = new Utilisateur();
        $lesUtilisateurs = $this->loadQuery($this->bd->execSQLSelect($this->select ." WHERE
        id_uti = :idUti", [':idUti'=>$idUti]) );
        if (count($lesUtilisateurs) > 0) { 
            $unUtilisateur = $lesUtilisateurs[0]; 
        }
        return $unUtilisateur;
        // il y a un seul élément dans le tableau d'utilisateurs ➔ indice 0 return $unUtilisateur;
    }	

    function getByEmail (string $email) : Utilisateur {
        $unUtilisateur = new Utilisateur();
        $lesUtilisateurs = $this->loadQuery($this->bd->execSQLSelect($this->select ." WHERE
        email = :email", [':email'=>$email]) );
        if (count($lesUtilisateurs) > 0) { 
            $unUtilisateur = $lesUtilisateurs[0]; 
        }
        return $unUtilisateur;
        // il y a un seul élément dans le tableau d'utilisateurs ➔ indice 0 return $unUtilisateur;
    }	

    function existe (int $idUti) : bool {
        $req = "SELECT * 
                FROM utilisateur 
                WHERE id_uti = :idUti";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idUti'=>$idUti])));
        return ($res != []); // si tableau d'utilisateurs est vide alors l'utilisateur n’existe pas
    }

    function getNbrAmi (int $idUti) : int {
        $lesAmis = $this->bd->execSQLSelect("SELECT * FROM ami WHERE
        id_uti = :idUti AND status ='accepté'", [':idUti'=>$idUti]);
        $nbrAmi = count($lesAmis);
        return $nbrAmi;
    }
}    
?>